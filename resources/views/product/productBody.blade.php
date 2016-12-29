@inject('urlDeal','App\Providers\Url')
@inject('attributeValues','App\Providers\Category')
<!--产品信息 start-->
<div class="goods auto shadow">
    <div class="url_here">
        <a href="/all">产品大全</a><code>&gt;</code>
        <a href="/product-{{ $product->productId }}.html">{{ $product->name }}</a>
    </div>

    <!--左侧-->
    <div class="img_list_box">
        <div class="lg_img_div">
            <img class="" src="{{ $urlDeal->getProductImageUrl($product->productId) }}">
        </div>

        <ul class="sm_img_list">
            @foreach($productImages as $productImage)
            <li>
                <a href="#">
                    <img src="{{ $productImage->img }}">
                    <span>{{ $productImage->name }}</span>
                </a>
            </li>
            @endforeach
        </ul>

        <div class="color_list">
            <span>颜色：</span>
            <ul>
                @foreach($productColors as $productColor)
                <li>{{ $attributeValues->getAttributeValue($productColor->attributeValueId)[0]->attributeValue }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--左侧 END-->

    <!--右侧-->
    <div class="goods_info_box">
        <h1>{{ $product->name }}</h1>
        <div class="goods_info_price">
            <p>参考价格：<span>￥{{ $product->marketPrice }}</span></p>
        </div>

        <div class="goods_info_list">
            <ul>
                <li>
                    <i class="one_i"></i>
                    <p><b>主屏尺寸：</b>{{ $attributeValues->getAttrName($product->productId,4) }}</p>
                    <p><b>主屏分辨率：</b>{{ $attributeValues->getAttrName($product->productId,14) }}</p>
                </li>
                <li>
                    <i class="two_i"></i>
                    <p><b>后置摄像头：</b>{{ $attributeValues->getAttrName($product->productId,7) }}</p>
                    <p><b>网络：</b>{{ $attributeValues->getAttrName($product->productId,5) }}</p>
                </li>
                <li>
                    <i class="three_i"></i>
                    <p><b>电池容量：</b>{{ $attributeValues->getAttrName($product->productId,13) }}</p>
                </li>
                <li>
                    <i class="four_i"></i>
                    <p><b>核心数：</b>{{ $attributeValues->getAttrName($product->productId,11) }}</p>
                    <p><b>内存：</b> {{ $attributeValues->getAttrName($product->productId,9) }}</p>
                </li>
            </ul>
        </div>

        <div class="goods_info_news">
            <h3>选机必读</h3>
            <a class="news_more" href="/category">查看更多文章></a>
            <ul>
                @foreach($newses as $news)
                    @if ($loop->first)
                        <li><a href="/article-{{ $news->articleId }}.html"><b>新闻</b>{{ $news->title }}</a></li>
                    @endif
                        <li><a href="/article-{{ $news->articleId }}.html"><i>新闻</i>{{ $news->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--右侧 END-->

</div>
<!--产品信息 end-->

<!--产品参数 start-->
<div class="goods_parameter auto shadow">
    <h3>{{ $product->name }} 详细参数</h3>
    @foreach(json_decode($product->productAttributeJson) as $attribute)
    <table>
        <thead>
        <tr>
            <th colspan="2">{{ $attribute->name }}</th>
        </tr>
        </thead>
        <tbody>
{{--        <tr><td>@if(isset($attribute->sub[0])){{ $attribute->sub[0] }}@endif</td></tr>--}}
        @foreach($attribute->sub as $value)
        <tr>
            <th>{{ $value->name }}</th>
            <td>{{ $value->val }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endforeach
</div>
<!--产品参数 end-->