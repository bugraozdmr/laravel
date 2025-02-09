<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Page</title>
</head>
<body>
    <h2>{{ $title }} !</h2>
    <p>{{ $description }}</p>
    <h3>Our Excellent Staff List</h3>
    {{--
    @foreach ($staffs as $staff)
        <p>{{ $staff }}</p>
    @endforeach
    --}}

    @for ($i = 0;$i < count($staffs);$i++)
        {{ $staffs[$i] }}
    @endfor
</body>
</html>