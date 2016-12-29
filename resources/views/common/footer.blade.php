@inject('links','App\Providers\Link')
<!--底部 start-->
<div class="footer">
    <div class="auto">
        <a class="logo2" href="/"></a>
        <div class="footer_link">
            <p>友情链接</p>
            <ul>
                @foreach($links->getLinks() as $link)
                <li><a href="{{ $link->url }}">{{ $link->linkName }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!--底部 end-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ elixir("js/jquery-1.11.1.min.js") }}"></script>
<script src="{{ elixir("js/search.js") }}"></script>
