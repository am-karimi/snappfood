@extends('layouts.dashboard')

@section('body')
    {{--    @dd($foods)--}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col">

{{--        <div class="col-md-12">--}}
{{--            @if (session('success'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session('success') }}--}}
{{--                </div>--}}
{{--            @elseif(session('update'))--}}
{{--                <div class="alert alert-warning">--}}
{{--                    {{ session('update') }}--}}
{{--                </div>--}}
{{--            @elseif(session('delete'))--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <p>{{ session('delete') }}</p>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}


        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('seller'))
            <div class="mb-2">
                <form action="{{    route('discounts.chooseRestaurant')    }}"   method="get">
                    <input type="submit" class="w-full bg-indigo-500 rounded h-10" value="Make New Discount">
                </form>
            </div>
        @endif


        <div class="mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Value
                    </th>
                    <th scope="col" class="px-6 py-3">
                        For Food
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($discounts as $discount)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{   $discount->id  }}
                        </td>
                        </td>
                        <td class="px-6 py-4">
                            {{   $discount->title  }}
                        </td>
                        <td class="px-6 py-4">
                            {{   $discount->value  }} %
                        </td>
                        <td class="px-6 py-4">
                            @foreach($discount->foods as $food)
                            <p>{{$food->name}}</p><br>
                            @endforeach
                        </td>
                        <form action="{{   route('discounts.destroy',$discount)   }}" method="post">
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
    {{ $discounts->links() }}

@endsection





