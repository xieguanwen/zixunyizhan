@extends('layouts.base')

@section('keywords',trans("common.index_keywords"))
@section('description',trans("common.index_description"))

@section('title', trans("common.index_title"))

@section('content')
    @include('index.imageBlock')
    @include('index.topNews')
    @include('index.article')
    @include('index.product')
    @include('index.articleInfo')
@endsection

@section('jsSelf')
    <script src="{{ elixir('js/jquery.SuperSlide.2.1.1.js') }}"></script>
    <script src="{{ elixir('js/index.js') }}"></script>
@endsection