<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeFilamentUser extends Command
{
    protected $signature = 'filament:user:create-custom';

    protected $description = 'Custom Filament user creator with extra fields';

    public function handle()
    {
        $this->info('Create Filament user (/admin)');

        $name = $this->validAsk('Name', ['required', 'min:3']);

        $email = $this->validAsk('Email', ['required', 'email', 'unique:users,email']);

        $phone = $this->validAsk('Phone', ['required', 'min:8']);

        $jobTitle = $this->validAsk('Job Title', ['required', 'min:2']);

        $password = $this->secret('Password');

        $passwordConfirm = $this->secret('Confirm Password');

        if ($password !== $passwordConfirm) {
            $this->error('Passwords do not match.');
            return Command::FAILURE;
        }

        if (! $this->confirm('Do you want to create this Filament user?')) {
            $this->warn('Cancelled.');
            return Command::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'job_title' => $jobTitle,
            'password' => Hash::make($password),
        ]);

        $this->info('User created successfully for /admin');

        $this->table(
            ['ID', 'Name', 'Email', 'Phone', 'Job Title'],
            [[
                $user->id,
                $user->name,
                $user->email,
                $user->phone,
                $user->job_title,
            ]]
        );

        return Command::SUCCESS;
    }

    private function validAsk($label, $rules)
    {
        do {
            $value = $this->ask($label);

            $validator = Validator::make(
                [$label => $value],
                [$label => $rules]
            );

            if ($validator->fails()) {
                $this->error($validator->errors()->first());
                $valid = false;
            } else {
                $valid = true;
            }

        } while (! $valid);

        return $value;
    }
}
