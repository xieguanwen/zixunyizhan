<!--第四版（热门手机） start-->
<div class="main_phone auto shadow">
    <!--热门手机头部 start-->
    <div class="main_phone_header main_phone_public">
        <ul>
            <li class="active">热门手机</li>
            <li>1000元以下</li>
            <li>1000-2000</li>
            <li>2000-3000</li>
        </ul>
        <a href="">选机中心&gt;</a>
    </div>
    <!--热门手机头部 end-->

    <!--热门手机内容 start-->
    <div class="main_phone_content">
        <!--main_phone_menu 热门手机内容循环 start-->
        <div class="main_phone_menu active">
            @foreach($productHot as $key=>$products)
                <div class="main_phone_list">
                    @if($products)
                        <span>{{ $key }}<i>&gt;</i></span>
                        <ul>
                            @foreach($products as $product)
                                <li><a href="/product-{{ $product->productId }}.html">{{ $product->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
        <!--main_phone_menu 热门手机内容循环 end-->

        <!--main_phone_menu 热门手机内容循环 1000以下的 start-->
        <div class="main_phone_menu">
            @foreach($product1 as $key=>$products)
                <div class="main_phone_list">
                    @if($products)
                        <span>{{ $key }}<i>&gt;</i></span>
                        <ul>
                            @foreach($products as $product)
                                <li><a href="/product-{{ $product->productId }}.html">{{ $product->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
        <!--main_phone_menu 热门手机内容循环 end-->

        <!--main_phone_menu 热门手机内容循环 1000-2000 start-->
        <div class="main_phone_menu">
            @foreach($product2 as $key=>$products)
                <div class="main_phone_list">
                    @if($products)
                    <span>{{ $key }}<i>&gt;</i></span>
                    <ul>
                        @foreach($products as $product)
                            <li><a href="/product-{{ $product->productId }}.html">{{ $product->name }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            @endforeach
        </div>
        <!--main_phone_menu 热门手机内容循环 end-->

        <!--main_phone_menu 热门手机内容循环 2000-3000 start-->
        <div class="main_phone_menu">
            @foreach($product3 as $key=>$products)
                <div class="main_phone_list">
                    @if($products)
                        <span>{{ $key }}<i>&gt;</i></span>
                        <ul>
                            @foreach($products as $product)
                                <li><a href="/product-{{ $product->productId }}.html">{{ $product->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
        <!--main_phone_menu 热门手机内容循环 end-->
    </div>
    <!--热门手机内容 end-->
</div>
<!--第四版（热门手机） end-->