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

        <div class="w-full">
            <h1 class="font-bold text-center text-2xl text-blue-700 my-2">
                Set Time For {{ $restaurant->name}}
            </h1>
        </div>

        <form action="{{    route('workingHours.store')    }}" method="post">
            @csrf
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Days
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Open Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Close Time
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <input type="hidden" value="{{$restaurant->id}} " name="restaurant">
                        <td class="px-6 py-4">
                            <select id="day" name="day"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                                @foreach($days as $day)
                                    <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <input type="time" name="open_time" value="" class="p-2 rounded w-1/2" required>
                        </td>
                        <td class="px-6 py-4">
                            <input type="time" name="close_time" value="" class="p-2 rounded w-1/2" required>
                        </td>
                    </tr>
                </tbody>

            </table>
            <div class="bg-blue-500 w-full rounded text-center font-bold">
                <input type="submit"  class="p-2 rounded w-1/2">
            </div>
        </form>
    </div>

@endsection


