@extends("layouts.base")

@section('keywords',trans('product.all_keywords'))
@section('description',trans('product.all_keywords'))
@section('title', trans('product.all_title'))

@section('content')
    {{--@inject('categoryProvider','App\Providers\Category')--}}
    @include("product.allBody")
@endsection

@section('jsSelf')
    <script type="text/javascript" src="{{ elixir("js/product.js") }}" ></script>
@endsection

