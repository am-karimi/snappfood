@extends('layouts.dashboard')

@section('body')
    {{--    @dd($foods)--}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col">

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


        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('seller'))
            <div class="mb-2">
                <form action="{{route('foods.create')}}" METHOD="get">
                    <input type="submit" class="w-full bg-indigo-500 rounded h-10" value="Make New Food">
                </form>
            </div>
        @endif

        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin|superAdmin'))
            <div class="col-md-24">
                <form action="{{route('foods.restaurantFilter')}}" METHOD="post">
                    @csrf
                    <div class="flex-row flex justify-between">
                        <select id="restaurant_category_id" name="restaurant_category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select your restaurant</option>
                            @if(isset($restaurants))
                                @foreach($restaurants as $restaurant)
                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div
                            class="restaurant_category jus bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-md-10">
                            <input type="submit" value="GO" class="w-1/2">
                        </div>
                    </div>
                </form>
            </div>
        @endif

        <form action="{{ route('foods.categoryFilter'  )}}" METHOD="post">
            @csrf
            <div class="py-2 flex flex-row justify-between">
                <select id="food_category_id" name="food_category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select your Food Category</option>
                    @if(isset($foodCategories))
                        @foreach($foodCategories as $foodCategory)
                            <option value="{{$foodCategory->id}}">{{$foodCategory->name}}</option>
                        @endforeach
                    @endif
                </select>

                <div
                    class="restaurant_category jus bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-md-10">
                    <input type="submit" value="GO" class="w-1/2 text-center">
                </div>
            </div>
        </form>
    </div>

    <div class="mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    <td class="px-6 py-4">
                        {{   $food->name  }}
                    </td>
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.alert').fadeIn().delay(1000).fadeOut();
        });
    </script>
    <script>
        $(".restaurant_category").change(function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url: "/foods/restaurant",
                data: {
                    'id': id
                },
            });
        });
    </script>
@endsection



