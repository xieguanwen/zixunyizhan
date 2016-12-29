@extends("layouts.base")

@section('keywords',$product->keywords)
@section('description',$product->description)
@section('title', $product->name)

@section('content')
    @include("product.productBody")
@endsection