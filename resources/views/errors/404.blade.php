@extends('layouts.base')

@section('title',trans('common.404_title'))

@section('content')
    <div class="content_404">
        <div class="relative">
            <img class="img_404" src="img/404_03.jpg">
            <div class="text_01">
                <h3>英雄，木有这个页面哦!</h3>
                <p>核实一下链接，重新来过吧！</p>
                <a href="/">返回首页</a>
            </div>
        </div>
    </div>
@endsection
