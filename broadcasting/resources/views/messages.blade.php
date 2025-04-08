<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="user_id" content="{{ Auth::user()?->id }}">
    <title>Messages</title>
    
    {{-- Vite üzerinden JS dosyamızı yüklüyoruz --}}
    @vite('resources/js/app.js')
</head>
<body>
    <h1>Messages</h1>

    <div id="messages" style="padding: 1rem; background: #f3f3f3; margin-top: 1rem;"></div>
</body>
</html>
