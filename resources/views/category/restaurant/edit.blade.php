@extends('layouts.dashboard')

@section('body')
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5 rounded">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Slug
            </th>
            <th scope="col" class="px-6 py-3">
                Submit
            </th>
        </tr>
        </thead>
        <tbody>
        <form action="{{    route('restaurantCategories.update',$restaurantCategory      )   }}" method="post">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @csrf
                @method('put')
                <td class="px-6 py-4">
                    <input type="text" name="name" value="{{   $restaurantCategory->name    }} " class="text-black" >
                </td>
                <td class="px-6 py-4">
                    <input type="text" name="slug" value="{{   $restaurantCategory->slug    }}" class="text-black" >
                </td>
                <td class="px-6 py-4 text-center ">
                    <button type="submit"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Submit
                    </button>
                </td>
            </tr>
        </form>
        </tbody>
    </table>
@endsection
