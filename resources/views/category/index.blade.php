@extends("layouts.base")

@section('keywords',$keywords)
@section('description',$description)
@section('title', $title)

@section('content')
    @include("category.article-body")
@endsection

