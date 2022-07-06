@extends('layouts.dashboard')

@section('body')
    {{--add category--}}
    <h1 class="text-blue-600 text-2xl mt-5 font-bold">
        Make Food:
    </h1>
    <div class="bg-gray-500 p-6 rounded">
        <form action="{{    route('foods.store')   }}" method="post">
            <div class="mb-3">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Name
                </label>
                <input type="text" id="Name" name="name"
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
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-gray-300">
                    Raw Material
                </label>
                <input type="text" id="raw_material" name="raw_material"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-3">
                <input type="Submit" id="raw_material" name="raw_material"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </form>
    </div>
    {{--    <div class="rounded">--}}
    {{--        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded">--}}
    {{--            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
    {{--            <tr>--}}
    {{--                <th scope="col" class="px-6 py-3">--}}
    {{--                    Name--}}
    {{--                </th>--}}
    {{--                <th scope="col" class="px-6 py-3">--}}
    {{--                    Price--}}
    {{--                </th>--}}
    {{--                <th scope="col" class="px-6 py-3">--}}
    {{--                    Raw Material--}}
    {{--                </th>--}}
    {{--                <th scope="col" class="px-6 py-3">--}}
    {{--                    Food Category--}}
    {{--                </th>--}}
    {{--                <th scope="col" class="px-6 py-3">--}}
    {{--                    Add--}}
    {{--                </th>--}}
    {{--            </tr>--}}
    {{--            </thead>--}}
    {{--            <tbody>--}}
    {{--            <form action="{{    route('foods.store')   }}" method="post">--}}
    {{--                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
    {{--                    @csrf--}}
    {{--                    <td class="px-6 py-4">--}}
    {{--                        <input type="text" name="name" class="rounded h-10">--}}
    {{--                    </td>--}}

    {{--                    <td class="px-6 py-4">--}}
    {{--                        <input type="text" name="price" class="rounded h-10">--}}
    {{--                    </td>--}}

    {{--                    <td class="px-6 py-4">--}}
    {{--                        <select id="food_category_id" name="food_category_id"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-10">--}}
    {{--                            @foreach($foodCategories as $foodCategory)--}}
    {{--                                <option value="{{$foodCategory->id}}">{{$foodCategory->name}}</option>--}}
    {{--                            @endforeach--}}
    {{--                        </select>--}}
    {{--                    </td>--}}
    {{--                    <td class="px-6 py-4 text-center ">--}}
    {{--                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline h-10">--}}
    {{--                            Add--}}
    {{--                        </button>--}}
    {{--                    </td>--}}
    {{--                </tr>--}}

    {{--                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
    {{--                    <td class="px-6 py-4">--}}
    {{--                        <input type="text" name="price" class="rounded h-10">--}}
    {{--                    </td>--}}
    {{--                </tr>--}}
    </form>
    </tbody>
    </table>
    </div>
@endsection
