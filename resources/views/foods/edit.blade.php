
@extends('layouts.dashboard')

@section('body')

    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('update'))
            <div class="alert alert-warning">
                {{ session('update') }}
            </div>
        @elseif(session('delete'))
            <div class="alert alert-danger">
                <p>{{ session('delete') }}</p>
            </div>
        @endif
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5 rounded">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Price
            </th>
            <th scope="col" class="px-6 py-3">
                Raw Material
            </th>
            <th scope="col" class="px-6 py-3">
                Food Category
            </th>
            <th scope="col" class="px-6 py-3">
                Submit
            </th>
        </tr>
        </thead>
        <tbody>
        <form action="{{    route('foods.update',$food      )   }}" method="post">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @csrf
                @method('put')
                <td class="px-6 py-4">
                    <input type="text" name="name" value="{{   $food->name    }} " class="text-black" >
                </td>
                <td class="px-6 py-4">
                    <input type="text" name="slug" value="{{   $food->price    }}" class="text-black" >
                </td>
                <td class="px-6 py-4">
                    <textarea name="raw_material" id="raw_material" cols="20" rows="1">{{$food->raw_material}}</textarea>
                </td>
                <td class="px-6 py-4">
                    <select id="restaurant_category_id" name="restaurant_category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($foodCategories as $foodCategory)
                            <option value="{{$foodCategory->id}}">{{$foodCategory->name}}</option>
                        @endforeach
                    </select>
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
