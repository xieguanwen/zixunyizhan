<!--第五版（手机资讯） start-->
<div class="main_info main_phone auto shadow">
    <div class="main_info_header main_phone_public">
        <ul>
            <li class="active">手机资讯</li>
            <li>手机导购</li>
            <li>手机测评</li>
            <li>手机杂谈</li>
        </ul>
    </div>
    <div class="main_info_box">
        <!--main_info_content 手机资讯内容循环(1) start-->
        <div class="main_info_content active">
            <ul>
                @foreach($mobileInformations as $articleInfo)
                <li>
                    @if($articleInfo->thumbnail)
                    <img src="{{ $imageHost }}{{ $articleInfo->thumbnail }}">
                    @else
                    <img src="img/test/6.png">
                    @endif
                    <div class="main_info_right">
                        <h4><a href="/article-{{ $articleInfo->articleId }}.html">{{ $articleInfo->title }}</a></h4>
                        <p>{{ $articleInfo->summary }}</p>
								<span>
									<i class="icon_01">{{ $articleInfo->author }}</i>
									<i class="icon_02">{{ $articleInfo->addTime }}</i>
								</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!--main_info_content 手机资讯内容循环(1) start-->

        <!--main_info_content 手机资讯内容循环(2) start-->
        <div class="main_info_content">
            <ul>
                @foreach($mobileShoppingGuides as $articleInfo)
                    <li>
                        @if($articleInfo->thumbnail)
                            <img src="{{ $imageHost }}{{ $articleInfo->thumbnail }}">
                        @endif
                        <div class="main_info_right">
                            <h4><a href="/article-{{ $articleInfo->articleId }}.html">{{ $articleInfo->title }}</a></h4>
                            <p>{{ $articleInfo->summary }}</p>
								<span>
									<i class="icon_01">{{ $articleInfo->author }}</i>
									<i class="icon_02">{{ $articleInfo->addTime }}</i>
								</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--main_info_content 手机资讯内容循环(2)  start-->

        <!--main_info_content 手机资讯内容循环(3)  start-->
        <div class="main_info_content">
            <ul>
                @foreach($mobileTests as $articleInfo)
                    <li>
                        @if($articleInfo->thumbnail)
                            <img src="{{ $imageHost }}{{ $articleInfo->thumbnail }}">
                        @endif
                        <div class="main_info_right">
                            <h4><a href="/article-{{ $articleInfo->articleId }}.html">{{ $articleInfo->title }}</a></h4>
                            <p>{{ $articleInfo->summary }}</p>
								<span>
									<i class="icon_01">{{ $articleInfo->author }}</i>
									<i class="icon_02">{{ $articleInfo->addTime }}</i>
								</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--main_info_content 手机资讯内容循环(3) start-->

        <!--main_info_content 手机资讯内容循环(4) start-->
        <div class="main_info_content">
            <ul>
                @foreach($mobileTalks as $articleInfo)
                    <li>
                        @if($articleInfo->thumbnail)
                            <img src="{{ $imageHost }}{{ $articleInfo->thumbnail }}">
                        @endif
                        <div class="main_info_right">
                            <h4><a href="/article-{{ $articleInfo->articleId }}.html">{{ $articleInfo->title }}</a></h4>
                            <p>{{ $articleInfo->summary }}</p>
								<span>
									<i class="icon_01">{{ $articleInfo->author }}</i>
									<i class="icon_02">{{ $articleInfo->addTime }}</i>
								</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--main_info_content 手机资讯内容循环(4) start-->
    </div>

</div>
<!--第五版（手机资讯） end-->

<!--查看更多 start-->
<a class="main_info_more" href="/category">查看更多</a>
<!--查看更多 end-->