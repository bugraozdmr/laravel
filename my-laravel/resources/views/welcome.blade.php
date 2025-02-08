<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel App</title>
    <style>
        body{
            background: black;
            font-weight: 600;
        }
        h1,p{
            color: white;
        }
        a{
            color: orange;
            text-decoration: none;
            font-style: italic;
            font-size: 1.2rem;
            padding : 1.2rem;
        }
    </style>
</head>
<body>
    <h1>This is home page</h1>
    <a href="{{ route('about') }}">Check out about page</a>
    <a href="{{ route('getuser', ['id' => 2]) }}">Get User</a>
</body>
</html>