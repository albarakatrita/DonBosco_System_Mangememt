<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form->title }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white shadow-xl rounded-2xl p-8">

        {{-- TITLE --}}
        <div class="mb-8 border-b pb-4">
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $form->title }}
            </h1>

            <p class="text-gray-500 mt-2">
                Please fill out the form carefully.
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST">
            @csrf

            @foreach($fields as $field)

                @if($field['visible'])

                    <div class="mb-6">

                        {{-- LABEL --}}
                        <label class="block mb-2 font-semibold text-gray-700">

                            {{ $field['label'] }}

                            @if($field['required'])
                                <span class="text-red-500">*</span>
                            @endif

                        </label>

                        {{-- TEXT --}}
                        @if($field['type'] === 'text')

                            <input type="text"
                                name="{{ $field['key'] ?? $field['id'] }}"
                                placeholder="{{ $field['placeholder'] }}"
                                class="w-full border rounded-lg p-3">

                        @endif

                        {{-- TEXTAREA --}}
                        @if($field['type'] === 'textarea')

                            <textarea
                                name="{{ $field['key'] ?? $field['id'] }}"
                                placeholder="{{ $field['placeholder'] }}"
                                class="w-full border rounded-lg p-3"></textarea>

                        @endif

                        {{-- NUMBER --}}
                        @if($field['type'] === 'number')

                            <input type="number"
                                name="{{ $field['key'] ?? $field['id'] }}"
                                placeholder="{{ $field['placeholder'] }}"
                                class="w-full border rounded-lg p-3">

                        @endif

                        {{-- SELECT --}}
                        @if($field['type'] === 'select')

                            <select name="{{ $field['key'] ?? $field['id'] }}"
                                class="w-full border rounded-lg p-3">

                                <option value="">Select option</option>

                                @foreach($field['options'] as $option)
                                    <option value="{{ $option['value'] }}">
                                        {{ $option['label'] }}
                                    </option>
                                @endforeach

                            </select>

                        @endif

                        {{-- RADIO --}}
                        @if($field['type'] === 'radio')

                            <div class="space-y-2">

                                @foreach($field['options'] as $option)

                                    <label class="flex items-center gap-2">

                                        <input type="radio"
                                            name="{{ $field['key'] ?? $field['id'] }}"
                                            value="{{ $option['value'] }}">

                                        <span>{{ $option['label'] }}</span>

                                    </label>

                                @endforeach

                            </div>

                        @endif

                        {{-- CHECKBOX --}}
                        @if($field['type'] === 'checkbox')

                            <div class="space-y-2">

                                @foreach($field['options'] as $option)

                                    <label class="flex items-center gap-2">

                                        <input type="checkbox"
                                            name="{{ ($field['key'] ?? $field['id']) }}[]"
                                            value="{{ $option['value'] }}">

                                        <span>{{ $option['label'] }}</span>

                                    </label>

                                @endforeach

                            </div>

                        @endif

                    </div>

                @endif

            @endforeach

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                Submit
            </button>

        </form>

    </div>

</div>

</body>
</html>
