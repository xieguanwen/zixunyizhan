@extends("layouts.base")

@section('keywords',$article->keywords)
@section('description',$article->description)
@section('title', $article->title)

@section('content')
    @include("article.articleBody")
@endsection