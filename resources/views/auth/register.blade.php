@extends('log-reg-style.front')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="h-16 w-16">
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="name" class="block mt-1 w-full p-2 border rounded-md bg-gray-100 dark:bg-gray-700 dark:text-gray-300" 
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="email" class="block mt-1 w-full p-2 border rounded-md bg-gray-100 dark:bg-gray-700 dark:text-gray-300"
                              type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="password" class="block mt-1 w-full p-2 border rounded-md bg-gray-100 dark:bg-gray-700 dark:text-gray-300"
                              type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full p-2 border rounded-md bg-gray-100 dark:bg-gray-700 dark:text-gray-300"
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Already Registered -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

@endsection
