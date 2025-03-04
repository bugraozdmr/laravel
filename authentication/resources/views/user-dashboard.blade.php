<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>User Dashboard</h3>
        @auth
        <p>Name: {{auth()->user()->name}}</p>
        <p>Email: {{auth()->user()->email}}</p>
        @endauth
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">LOGOUT</button>
        </form>
    </div>
</body>
</html>