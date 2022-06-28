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
                    Slug
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
            @foreach($foodCategories as $foodCategory)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{   $foodCategory->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{   $foodCategory->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $foodCategory->slug  }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{   route('foodCategories.edit',$foodCategory)    }}"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>

                    <form action="{{   route('foodCategories.destroy',$foodCategory)   }}" method="post">
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
        {{ $foodCategories->links() }}
    </div>

    {{--add category--}}
    <h1 class="text-blue-600 text-2xl mt-5 font-bold">
        Add New Food Category:
    </h1>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Slug
            </th>
            <th scope="col" class="px-6 py-3">
                Add
            </th>
        </tr>
        </thead>
        <tbody>
        <form action="{{    route('foodCategories.store')   }}" method="post">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @csrf
                <td class="px-6 py-4">
                    <input type="text" name="name">
                </td>
                <td class="px-6 py-4">
                    <input type="text" name="slug">
                </td>
                <td class="px-6 py-4 text-center ">
                    <button type="submit"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Add
                    </button>
                </td>
            </tr>
        </form>
        </tbody>
    </table>
@endsection



