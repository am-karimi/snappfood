@extends('layouts.dashboard')

@section('body')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col">

        <div class="col-md-24">
            <form action="{{    route('orders.filter')    }}" METHOD="post">
                @csrf
                <div class="flex-row flex justify-between">
                    <select id="restaurant_id" name="restaurant_id"
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
                        <input type="submit" value="Filter" class="w-1/2">
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cart's Items
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Change Status
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(isset($orders))
                    @foreach($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{   $order->user->name  }}
                            </td>
                            </td>
                            <td class="px-6 py-4">
                                @foreach($order->cart->cartItems as $item)
                                    <span>{{  $item->food->name  }} </span> <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach($order->cart->cartItems as $item)
                                    <span>{{  $item->quantity  }} </span> <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach($order->cart->cartItems as $item)
                                    <span>{{  $item->food->price  }} </span> <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach($order->cart->cartItems as $item)
                                    <span>
{{--                                        {{ $discountValue=isset($item->food->discount) ? $item->food->discount->value : 0 }}--}}
                                        {{  $item->food->price * (100-(isset($item->food->discount) ? $item->food->discount->value : 0) )* 0.01 * $item->quantity }}
                                    </span> <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{   $order->status  }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{   route('orders.status',$order)    }}"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Change</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

@endsection





