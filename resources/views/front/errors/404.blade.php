<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset($setting->where('key', 'favicon')->first()->val) }}">
    <meta content="Devnile" name="author">
    <title>404</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('front/assets/css/404.css') }}" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h3>{{ __('lang.oops_page_not_found') }}</h3>
            <h1><span>4</span><span>0</span><span>4</span></h1>
        </div>
        <h2>{{ __('lang.page_you_are_looking') }}</h2>
        <a href="{{ url('/') }}">{{ __('lang.back_to_home') }}</a>
    </div>
</div>
</body>
</html>
