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
                    <span class="sr-only"></span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($resCategories as $resCategory)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{   $resCategory->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{   $resCategory->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $resCategory->slug  }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{   route('category.restaurant.edit',$resCategory)    }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>

                    <td class="px-6 py-4 text-center ">
                        <form action="{{   route('category.restaurant.edit',$resCategory)   }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $resCategories->links() }}
    </div>

@endsection

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.alert').fadeIn().delay(1000).fadeOut();--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $(".status").change(function () {--}}

{{--            var status = $(this).data('status');--}}
{{--            var id = $(this).val();--}}
{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                headers: {--}}
{{--                    'X-CSRF-Token': '{{ csrf_token() }}',--}}
{{--                },--}}
{{--                url: "/users/status",--}}
{{--                data: {--}}
{{--                    'status': status == 0 ? 1 : 0,--}}
{{--                    'id': id--}}
{{--                },--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
