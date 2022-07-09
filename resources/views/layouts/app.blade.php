<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @yield('background')
    </style>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{--        Toaster Added       --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{--        Toaster Ended       --}}

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
<x-jet-banner/>

<div class="min-h-screen bg-gray-100">
{{--            @livewire('navigation-menu')--}}

<!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <main>

        {{--        //full body--}}
        @yield('content')

        {{--        //footer--}}
        @if(\Illuminate\Support\Facades\Auth::guest())
            {{--            @extends('layouts.footer')--}}
        @endif

        @yield('scripts')
    </main>
</div>

@stack('modals')
{{--        Toaster Script Added        --}}
@if(Session::has('message'))
    <script>

        toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.success("{{ session('message') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.error("{{ session('error') }}");
    </script>
@endif

@if(Session::has('info'))
    <script>
        toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.info("{{ session('info') }}");
    </script>
@endif

@if(Session::has('warning'))
    <script>
        toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.warning("{{ session('warning') }}");
    </script>
@endif
{{--        Toaster Script Ended         --}}

{{--        @livewireScripts--}}
</body>
</html>
