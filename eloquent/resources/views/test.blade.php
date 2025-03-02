<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{--
    <h3>Users</h3>
    <div>
        @foreach ($users as $user)
            <h4> {{$user->name}} </h4>
            <p> Address : {{$user->address->country ?? '?'}}</p>
            <hr>
        @endforeach
    </div>
    --}}
    <h3>Users</h3>
    <div>
        {{-- bu durumda array geliyor one to many --}}
        @foreach ($users as $user)
            <h4> {{$user->name}} </h4>
            <h5>User total post count : {{$user->posts->count()}}</h5>
            @foreach ($user->addresses as $address)
                <p> Address : {{$address}}</p>
                <hr>
            @endforeach
            <hr>
        @endforeach
    </div>
    {{-- 
    <h3>Addresses</h3>
    <div>
        @foreach ($address as $addres)
            <h4> {{$addres->country}} </h4>
            <p> User : {{$addres->user->name.' - '.$addres->user->email}}</p>
            <hr>
        @endforeach
    </div>
    --}}
</body>
</html>