<div class="main_read auto shadow">
    <b>导读</b>
    <div class="main_read_introduce">
        <div class="main_read_left">
            <a href="{{ $articleImageTop[0]->url }}"><img src="{{ $imageHost }}{{ $articleImageTop[0]->adImage }}"></a>

            @foreach($introductionLefts as $introductionLeft)
            <div>
            <h3>
                <a href="/article-{{ $introductionLeft->articleId }}.html">{{ $introductionLeft->title }}</a>
                <i>来源：{{ $introductionLeft->source }}</i>
            </h3>
            <p>{{ $introductionLeft->description }}</p>
            @if($introductionLeft->newsImage)
            <img src="{{ $imageHost }}{{ $introductionLeft->newsImage }}">
            @endif
            </div>
            @endforeach
        </div>

        <div class="main_read_center">
            @foreach($introductionCenters as $introductionCenter)
                <div>
                    <h3>
                        <a href="/article-{{ $introductionCenter->articleId }}.html">{{ $introductionCenter->title }}</a>
                        <i>来源：{{ $introductionCenter->source }}</i>
                    </h3>
                    <p>{{ $introductionCenter->description }}</p>
                    @if($introductionCenter->newsImage)
                        <img src="{{ $imageHost }}{{ $introductionCenter->newsImage }}">
                    @endif
                </div>
            @endforeach
            <a href="{{ $articleImageBottom[0]->url }}"><img src="{{ $imageHost }}{{ $articleImageBottom[0]->adImage }}"></a>
        </div>

        <div class="main_read_right">
            <div class="read_right_div read_right_one">
                <h3>一周热点</h3>
                <ul>
                    @foreach($hotWeeks as $hotWeek)
                    <li>
                        <h4><a href="/article-{{ $hotWeek->articleId }}.html">{{ $hotWeek->title }}</a></h4>
                        <p>{{ $hotWeek->description }}</p>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ $articleImageLeft[0]->url }}"><img src="{{ $imageHost }}{{ $articleImageLeft[0]->adImage }}"></a>
            </div>


            <div class="read_right_div read_right_two">
                <ul>
                    @foreach($subjects as $subject)
                    <li>
                        <h4><a href="/article-{{ $subject->articleId }}.html">{{ $subject->title }}</a></h4>
                        <p>{{ $subject->description }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>