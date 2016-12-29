<div class="category">
    <div class="auto">
        <div class="title">
            <h3>{{ $title }}</h3>
        </div>

        <div class="category_list">
            <ul>
                @foreach($articles as $article)
                <li>
                    <a href="/article-{{ $article->articleId }}.html">
                        @if($article->thumbnail)
                            <img src="{{$imageHost}}{{ $article->thumbnail }}">
                        @else
                            <img src="img/img.jpg">
                        @endif
                        <h4>{{ $article->title }}</h4>
                        <p>{{ $article->summary }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>



    <!--分页 start-->
    <div class="guide_paging">
        {{ $articles->links() }}
    </div>
    <!--分页 end-->
</div>