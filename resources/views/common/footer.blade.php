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

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-89956677-1', 'auto');
    ga('send', 'pageview');

</script>
