<div class="article ">
    <div class="auto">
        <div class="article_list shadow">
            <div class="title">
                <h3>{{ $article->title }}</h3>
            </div>
            <div class="article_list_content">
                <div class="article_content_div">
                    {!! $article->content !!}}
                </div>
            </div>
        </div>

        <div class="article_news">
            <div class="article_news_list shadow">
                <div class="title">
                    <h3>选购详情</h3>
                </div>
                <div class="article_news_links">
                    <ul>
                        @foreach($purchases as $purchase)
                        <li><a href="/article-{{ $purchase->articleId }}.html">{{ $purchase->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="article_news_list article_news_two shadow">
                <div class="title">
                    <h3>推荐新闻</h3>
                </div>
                <div class="article_news_links">
                    <ul>
                        @foreach($recommends as $recommend)
                            <li><a href="/article-{{ $recommend->articleId }}.html">{{ $recommend->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>