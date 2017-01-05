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
            <li>&frasl;<a href="/shoujidaquan">手机大全</a></li>
            <li>&frasl;<a href="/xuangouzhinan">选购指南</a></li>
            <li>&frasl;<a href="/shiyongxiangqing">使用详情</a></li>
            <li>&frasl;<a href="/pingcejiexi">评测解析</a></li>
            <li>&frasl;<a href="/shoujiduibi">手机对比</a></li>
            <li>&frasl;<a href="/shoujiyingyong">手机应用</a></li>
        </ul>
    </div>
</div>
<!--头部 end-->