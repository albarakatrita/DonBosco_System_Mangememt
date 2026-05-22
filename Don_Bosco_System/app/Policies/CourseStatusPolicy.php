<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CourseStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseStatusPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CourseStatus');
    }

    public function view(AuthUser $authUser, CourseStatus $courseStatus): bool
    {
        return $authUser->can('View:CourseStatus');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CourseStatus');
    }

    public function update(AuthUser $authUser, CourseStatus $courseStatus): bool
    {
        return $authUser->can('Update:CourseStatus');
    }

    public function delete(AuthUser $authUser, CourseStatus $courseStatus): bool
    {
        return $authUser->can('Delete:CourseStatus');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CourseStatus');
    }

    public function restore(AuthUser $authUser, CourseStatus $courseStatus): bool
    {
        return $authUser->can('Restore:CourseStatus');
    }

    public function forceDelete(AuthUser $authUser, CourseStatus $courseStatus): bool
    {
        return $authUser->can('ForceDelete:CourseStatus');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CourseStatus');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CourseStatus');
    }

    public function replicate(AuthUser $authUser, CourseStatus $courseStatus): bool
    {
        return $authUser->can('Replicate:CourseStatus');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CourseStatus');
    }

}