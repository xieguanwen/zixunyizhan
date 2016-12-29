@extends('layouts.base')

@section('title',trans('common.search_title'))

@inject('urlDeal','App\Providers\Url')

@section('content')
    <!--面包屑 start-->
    <div class="search_url_here relative">
        <a href="/">首页</a><code>&gt;</code>
        <span>搜索结果</span><code>&gt;</code>
        <span>{{ $keyword }}</span>
    </div>
    <!--面包屑 end-->

    <!--相关产品 start-->
    <div class="about_div relative">
        <h3>相关产品</h3>
        <div class="about_goods">
            <ul>
                @foreach($products as $product)
                <li>
                    <a href="/product-{{ $product->productId }}.html">
                        {{--<img src="img/test/img.jpg">--}}
                        <img src="{{ $urlDeal->getProductUrl($product->productId) }}">
                        <h4>{{ $product->name }}</h4>
                    </a>
                    <p>参考价:<span>￥{{ $product->marketPrice }}</span></p>
                    {{--<a class="comment_num" href="">123人点评</a>--}}
                </li>
                @endforeach
            </ul>
        </div>

        <!--分页 start-->
        <div class="search_guide_paging">
            {{ $products->links() }}
        </div>
        <!--分页 end-->
    </div>
    <!--相关产品 end-->

    <!--相关文章 start-->
    <div class="about_div about_two relative">
        <h3>相关文章</h3>
        <div class="about_article">
            <ul>
                @foreach($articles as $article)
                <li>
                    <a href="/article-{{ $article->articleId }}.html"><img src="{{ $article->thumbnail }}"></a>
                    <div class="text">
                        <h2><a href="/article-{{ $article->articleId }}.html">{{ $article->title }}</a></h2>
                        <p>{{ $article->description }}</p>
                        <a class="article_link" href="/article-{{ $article->articleId }}.html">查看详情 ></a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!--分页 start-->
        <div class="search_guide_paging">
            <ul>
                {{ $articles->links() }}
            </ul>
        </div>
        <!--分页 end-->
    </div>
    <!--相关文章 end-->
@endsection