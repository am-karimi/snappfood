@extends('layouts.dashboard')

@section('body')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

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


        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
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
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($foods as $food)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{   $food->id   }}
                    </th>
                    <td class="px-6 py-4">
                        {{   $food->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $food->price  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $food->raw_material  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $food->foodCategory->name  }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{   route('foods.edit',$food)    }}"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>

                    <form action="{{   route('foods.destroy',$food)   }}" method="post">
                        <td class="px-6 py-4 text-center ">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Delete
                            </button>
                        </td>
                    </form>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $foods->links() }}

    {{--add category--}}
    <h1 class="text-blue-600 text-2xl mt-5 font-bold">
        Add New Foods:
    </h1>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
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
                Add
            </th>
        </tr>
        </thead>
        <tbody>
        <form action="{{    route('foods.store')   }}" method="post">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @csrf
                <td class="px-6 py-4">
                    <input type="text" name="name">
                </td>
                <td class="px-6 py-4">
                    <input type="text" name="price">
                </td>
                <td class="px-6 py-4">
                    <textarea name="raw_material" id="raw_material" cols="20" rows="1"></textarea>
                </td>
                <td class="px-6 py-4">
                    <select id="food_category_id" name="food_category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($foodCategories as $foodCategory)
                            <option value="{{$foodCategory->id}}">{{$foodCategory->name}}</option>
                        @endforeach

                    </select>
                </td>
                <td class="px-6 py-4 text-center ">
                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Add
                    </button>
                </td>
            </tr>
        </form>
        </tbody>
    </table>
@endsection



