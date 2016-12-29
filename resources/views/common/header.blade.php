@inject('search','App\Providers\Search')
<!--头部 start-->
<div class="header auto">
    <a class="logo" href="/"></a>
    <div class="search_box">
        <form action="/search" method="get">
            <input name="keyword" class="text_search" type="text" placeholder="最潮流的手机......">
            <input class="sub_search" type="submit" value="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <ul>
                @foreach($search->getHotSearch() as $searchObject)
                <li><a href="{{ $searchObject->url }}">{{ $searchObject->name }}</a></li>
                @endforeach
            </ul>
        </form>
    </div>
    <div class="nav">
        <ul>
            <li>&frasl;<a href="/">首页</a></li>
            <li>&frasl;<a href="/category">手机大全</a></li>
            <li>&frasl;<a href="">选购指南</a></li>
            <li>&frasl;<a href="">使用详情</a></li>
            <li>&frasl;<a href="">评测解析</a></li>
            <li>&frasl;<a href="">手机对比</a></li>
            <li>&frasl;<a href="">手机应用</a></li>
            <li>&frasl;<a href="">其他</a>&frasl;</li>
        </ul>
    </div>
</div>
<!--头部 end-->