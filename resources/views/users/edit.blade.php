@extends('layouts.dashboard')

@section('body')
    <div class="container px-24">
        <h1 class="text-blue-600 text-4xl font-bold justify-items-center p-5">
            Edit User
        </h1>

        <form method="POST" action="{{ route('users.update',$user) }}">
            @csrf
            @method('put')
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required
                             autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone') }}"/>
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{$user->phone}}" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                             value="{{$user->email}}" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Select Role') }}"/>
                <select name="role" id="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Choose here</option>
                    <option value="seller">Seller</option>
                    <option value="user">User</option>
                </select>
            </div>

            <x-jet-button class="mt-5 p-10">
                {{ __('Register') }}
            </x-jet-button>
        </form>
    </div>


@endsection
