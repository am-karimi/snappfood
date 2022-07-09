@extends('layouts.dashboard')

@section('body')

    <div>
        <form action="{{route('seller.restaurants.create')}}" METHOD="get">
            <input type="submit" class="w-full bg-indigo-500 rounded h-10" value="Make New Restaurant">
        </form>
    </div>
    @foreach($restaurants as $restaurant)
        <div class="w-full rounded h-10 mt-2">
            <div class="flex w-full text-center">
                <div class="mx-2 w-full">
                    <form action="{{route('seller.restaurants.edit',$restaurant)}}" METHOD="get">
                        <input type="submit" class="w-full bg-green-500 rounded h-10" value="Edit ">
                    </form>
                </div>

                <div class="mx-2 w-full">
                    <form action="{{route('seller.restaurants.destroy',$restaurant)}}" METHOD="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="w-full bg-red-700 rounded h-10" value="Delete ">
                    </form>
                </div>
            </div>
        </div>

        <div class="container bg-gray-400 rounded">
            <h1 class="text-2xl font-bold text-blue-600 mx-4 mt-2">
                Restaurant Profile:
            </h1>

            <div class="flex flex-row  mb-6 justify-items-center mt-2">
                <div class="w-full md:w-1/2 px-3 mb-2 mx-4 md:mb-0 pt-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Restaurant Name
                    </label>
                    <label
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="name" type="text">
                        {{  $restaurant->name     }}
                    </label>

                </div>
                <div class="w-full md:w-1/2 px-3 pt-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Phone Number
                    </label>
                    <label
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="name" type="text">
                        {{  $restaurant->phone_number     }}
                    </label>
                </div>
            </div>
            <div class="flex flex-row mx-4 mb-2 h-20">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-password">
                        Address
                    </label>
                    <label for=""
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        {{  $restaurant->address->address  }}
                    </label>
                </div>

                <div class="flex flex-wrap mx-4 mb-6">
                    <div class="w-full px-3 rounded">
                        <img src="https://picsum.photos/300/300?random=2" alt="">
                    </div>
                </div>
            </div>
            <div class="flex flex-row">
                <div class="flex flex-wrap mx-4 mb-6">
                    <div class="w-full px-3 mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Bank Id
                        </label>
                        <label class="appearance-none block w-60 bg-gray-200 text-gray-700 border border-gray-200
                        rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            {{   $restaurant->bank_id   }}
                        </label>
                    </div>
                </div>

                <div class="w-1/4 mx-12 mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-password">
                        Restaurant Category
                    </label>
                    <select id="restaurant_category_id" name="restaurant_category_id"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach($restaurant->restaurantCategories as $restaurantCategory)
                            <option value="{{$restaurantCategory->id}}">{{$restaurantCategory->name}}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="flex flex-col mx-4 mb-6 w-full">

                <div>
                    <div class="w-full px-3">
                        <label class="w-1/2 font-bold text-blue-800">
                            {{  $restaurant->status==1 ? 'Activated' : 'Not Active' }}
                        </label>
                    </div>
                </div>

                @endforeach
                <div class="w-full p-6">
                    {{       $restaurants->links()     }}
                </div>

            </div>
        </div>




@endsection
