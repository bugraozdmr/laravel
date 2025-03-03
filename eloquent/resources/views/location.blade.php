<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Country: <span style="font-weight: 600">{{$country->name}}</span></h3>
    <h3>State:</h3>
    @foreach ($country->states as $state)
        <ul>City: </ul>
        @foreach ($state->cities as $city)
            <li>{{$city->name}}</li>
        @endforeach
    @endforeach

    <p>Cities :{{$country->cities}}</p>

</body>
</html>