<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $setting->where('key', 'site_name')->first()->val }}</title>
    <link rel="shortcut icon" href="{{ asset($setting->where('key', 'favicon')->first()->val) }}" />
</head>
<body>
<h1>Welcome to Challenge Code</h1>

@guest
    <a href="{{ route('login') }}">Login</a><br>
    <a href="{{ route('register') }}">Register</a>
@else
    <a href="{{ route('home') }}">Home</a><br>
@endguest
</body>
</html>