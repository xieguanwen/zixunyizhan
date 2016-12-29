<div class="main_news auto shadow">
    <b>新闻</b>
    <h2><a href="/article-{{ $newsTopFirst[0]->articleId }}.html">{{ $newsTopFirst[0]->title }}</a></h2>
    <ul>
        @foreach($newsTops as $newsTop)
        <li><a href="/article-{{ $newsTop->articleId }}.html">{{ $newsTop->title }}</a></li>
        @endforeach
    </ul>
</div>