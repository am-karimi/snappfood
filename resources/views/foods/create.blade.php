@extends('layouts.dashboard')

@section('body')
    {{--add category--}}
    <h1 class="text-blue-600 text-2xl mt-5 font-bold">
        Make Food:
    </h1>
    <div class="bg-gray-500 p-6 rounded">
        <form action="{{    route('foods.store')   }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Name
                </label>
                <input type="text" id="name" name="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                    dark:text-gray-300">
                    Price
                </label>
                <input type="text" id="price" name="price"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Raw Material
                </label>
                <input type="text" id="raw_material" name="raw_material"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Food Category Id
                </label>
                <select id="food_category_id" name="food_category_id[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-16" multiple>
                    @foreach($foodCategories as $foodCategory)
                        <option value="{{$foodCategory->id}}">{{$foodCategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Select Restaurant
                </label>
                <select id="restaurant_category_id" name="restaurant_category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($restaurants as $restaurant)
                        <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
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
