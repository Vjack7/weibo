<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Weibo App') - laravel 新手入门教程</title>
{{--    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">{{--mix可以生成一个串，当文件改变时，会改变，让浏览器重新加载--}}--}}
    <link rel="stylesheet" href="{{ '/css/app.css' }}">{{--mix可以生成一个串，当文件改变时，会改变，让浏览器重新加载--}}
</head>
<body>
    @include('layouts._header')

    <div class="container">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>