<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
        <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <x-navbar />


            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <x-navbar />

            <x-footer/>

            
        </div>
        <!--jquery library js-->
        <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
        <!--bootstrap js-->
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <!--font-awesome js-->
        <script src="{{asset('assets/js/Font-Awesome.js')}}"></script>

        <script src="{{asset('assets/js/slick.min.js')}}"></script>
        <script src="{{asset('assets/js/select2.min.js')}}"></script>

        <!--main/custom js-->
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
