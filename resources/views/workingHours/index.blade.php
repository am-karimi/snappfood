@extends('layouts.dashboard')

@section('body')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <div class="w-full">
            <h1 class="font-bold text-center text-2xl text-blue-700 ">
                 {{ $restaurant->name}}
            </h1>
        </div>
        <!-- show Time -->

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Day
                </th>
                <th scope="col" class="px-6 py-3">
                    Open Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Close Time
                </th>
                <th scope="col" class="px-6 py-3">
                    <span>Delete</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($workingHours as $workingHour)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{   $workingHour->day  }}
                    </th>
                    <td class="px-6 py-4">
                        {{   $workingHour->open_time  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $workingHour->close_time  }}
                    </td>

                    <form action="{{   route('workingHours.destroy',$workingHour)   }}" method="post">
                        <td class="px-6 py-4 ">
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
        {{       $workingHours->links()     }}
    </div>

        <!-- create Time -->

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
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
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



