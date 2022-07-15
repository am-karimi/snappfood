@extends('layouts.dashboard')

@section('body')
    {{--add category--}}
    <h1 class="text-blue-600 text-2xl mt-5 font-bold">
        Make Discount:
    </h1>
    <div class="bg-gray-500 p-6 rounded">
        <form action="{{    route('discounts.store')   }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    title
                </label>
                <input type="text" id="title" name="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                    dark:text-gray-300">
                    value
                </label>
                <input type="text" id="value" name="value" placeholder="Percentage"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Food
                </label>
                <select id="food_id" name="food_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                    @foreach($foods as $food)
                        <option value="{{$food->id}}">{{$food->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <input type="Submit" id="update"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="Store">
            </div>
        </form>
    </div>
@endsection
