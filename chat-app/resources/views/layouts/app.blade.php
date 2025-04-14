<!DOCTYPE html>
<html class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <meta name="selected_contact" content="" >
    <meta name="auth_id" content="{{ auth()->user()?->id }}" >
    <meta name="base_url" content="{{ url('/') }}">
    <link rel='stylesheet prefetch'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

        <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/waveform.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>

    {{ $slot }}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{ $scripts ?? '' }}
</body>

</html>