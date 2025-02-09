<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="./css/app.css"> -->
    <title>My Laravel App</title>
</head>
<body>
    <h2>
        @if (date('H') < 12)
            Good morning
        @else
            Good afternoon
        @endif
         MR
    </h2>
    @php
        $name='grant wick';
    @endphp
    <h1>This is {{ $name }} home page</h1>
    <a href="/contact">Contact With Us !?</a>
    {{-- This is comment line --}}
    
</body>
</html>