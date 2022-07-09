@extends('layouts.dashboard')

@section('body')
    <div class="container bg-gray-400 rounded">

        <h1 class="text-2xl font-bold text-blue-600 mx-4 mt-2">
            Edit Restaurant:
        </h1>
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-blue-700 bg-red-100 rounded-lg dark:bg-red-400 dark:text-blue-800"
                 role="alert">
                @foreach ($errors->all() as $error)
                    <span class="font-medium">Danger alert! {{$error }}  </span><br>
                @endforeach
            </div>
        @endif

        <form class="w-full" method="post" action="{{   route('seller.restaurants.update',$restaurant)   }}">
            @csrf
            @method('put')

            <div class="flex flex-row  mb-6 justify-items-center mt-2">
                <div class="w-full md:w-1/2 px-3 mb-2 mx-4 md:mb-0 pt-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Restaurant Name
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="name" type="text" name="name" value="{{ $restaurant->name }}">
                </div>
                <div class="w-full md:w-1/2 px-3 pt-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Phone Number
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="phone_number" type="text" name="phone_number" value="{{ $restaurant->phone_number }}">
                </div>
            </div>
            <div class="flex flex-row mx-4 mb-2 h-20">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-password">
                        Address
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="address" type="text" name="address" value="{{$address->address}}">
                </div>

                <div class="flex flex-wrap mx-4 mb-6">
                    <div class="w-full px-3 ">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Bank Id
                        </label>
                        <input type="text" id="bank_id" name="bank_id" value="{{ $restaurant->bank_id }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                    </div>
                </div>

            </div>
            <div class="flex flex-row">
                <div class="flex flex-wrap mx-4 mb-6">
                    <div class="w-full px-3 mt-4 rounded">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="file_input">
                            Upload file
                        </label>
                        <input
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                           id="file_input_help">SVG, PNG, JPG or
                            GIF (MAX. 800x400px).</p>
                    </div>
                </div>

                <div class="w-1/4 mx-12 mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-password">
                        Restaurant Category
                    </label>
                    <select id="restaurant_category_id" name="restaurant_category_id[]" multiple
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-20">
                        @foreach($restaurantCategories as $restaurantCategory)
                            <option value="{{$restaurantCategory->id}}">{{$restaurantCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap mx-4 mb-6">
                <div class="w-full px-3">
                    <label for="status" class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Active Restaurant
                    </label>
                    <input type="checkbox" id="status" name="status" />
                </div>
                <div class="md:flex md:items-center mx-4">
                    <div class="md:w-1/3">
                        <button
                            class="shadow bg-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mb-6 mt-10"
                            type="submit">
                            Send
                        </button>
                    </div>
                    <div class="md:w-2/3"></div>
                </div>
            </div>
{{--        </form>--}}

    </div>

@endsection

