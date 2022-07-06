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

        <div class="mb-2">
            <form action="{{route('foods.create')}}" METHOD="get">
                <input type="submit" class="w-full bg-indigo-500 rounded h-10" value="Make New Restaurant">
            </form>
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

@endsection



