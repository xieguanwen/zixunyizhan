<!--第一版内容 start-->
<div class="container auto shadow">
    <div class="main_hot">
        <!--轮播图 start-->
        <div class="hot_left">
            <div class="bd">
                <ul>
                    @foreach($imageBlockBanners as $imageBlockBanner)
                    <li><a href="{{ $imageBlockBanner->url }}"><img src="{{ $imageHost }}{{ $imageBlockBanner->adImage }}"></a></li>
                    @endforeach
                </ul>

            </div>
            <div class="hd">
                <ul>
                    <li></li>
                </ul>
            </div>

            <button class="prev"></button>
            <button class="next"></button>
        </div>
        <!--轮播图 end-->

        <!--轮播图的右侧 start-->
        <div class="hot_right">
            <!--头条 start-->
            <div class="headlines hot_content">
                <b>头条</b>
                <ul>
                    @foreach($headlines as $headline)
                    <li>
                        <h3><a href="/article-{{ $headline->articleId }}.html">{{ $headline->title }}</a></h3>
                        <span>{{ $headline->description }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!--头条 end-->

            <!--热点 start-->
            <div class="hot_spots">
                <b>热点</b>
                <h3><a href="/article-{{ $hotSpotsFirst[0]->articleId }}.html">{{ $hotSpotsFirst[0]->title }}</a></h3>
                <ul>
                    @foreach($hotSpots as $hotSpot)
                    <li><a href="/article-{{ $hotSpot->articleId }}.html">{{ $hotSpot->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!--热点 end-->
        </div>
        <!--轮播图的右侧 end-->

    </div>
</div>
<!--第一版内容 end-->