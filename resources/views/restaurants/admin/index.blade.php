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

        <h1 class="text-2xl text-blue-700 mt-5 mb-5">
            All Snapp Food restaurants:
        </h1>

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
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Owner
                </th>
                <th scope="col" class="px-6 py-3">
                    Categories
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Show</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurants as $restaurant)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{   $restaurant->id   }}
                    </th>
                    <td class="px-6 py-4">
                        {{   $restaurant->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $restaurant->phone_number  }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.restaurants.show' , $restaurant) }}">{{  $restaurant->user->name  }}</a>
                    </td>
                    <td class="w-1/6 p-2 ">
                        <select id="restaurant_category_id" name="restaurant_category_id"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($restaurant->restaurantCategories as $restaurant->restaurantCategory)
                                <option value="{{$restaurant->restaurantCategory->id}}">
                                    {{$restaurant->restaurantCategory->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    {{--                    <form action="{{   route('admin.restaurants.destroy'),$restaurants   }}" method="post">--}}
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
    {{--    {{ $foods->links() }}--}}


@endsection



