<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield("keywords")">
    <meta name="description" content="@yield("description")">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ elixir("css/style.css") }}" rel="stylesheet">

    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('common.header')

@section('content')
    @show

@include('common.footer')

{{--自己定义的js--}}
@section('jsSelf')
@show

</body>
</html>