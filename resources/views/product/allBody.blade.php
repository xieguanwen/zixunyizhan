@inject('urlDeal','App\Providers\Url')
@inject('attributeValues','App\Providers\Category')
<!--手机大全 start-->
<div class="all">
    <div class="auto">
        <div class="title">
            <h3>手机大全</h3>
        </div>

        <!--产品选项 start-->
        <div class="all_list shadow">
            <!--手机品牌 start-->
            @foreach($attributes as $attribute)
            <div class="all_list_div">
                <span>{{ $attribute->name }}<i>&gt;</i></span>
                <div class="all_list_right">
                    <ul>
                        <li class="@if($urlDeal->activeFirst($contentUrl,$attribute->attributeId)) active @endif one"><a href="{{ $urlDeal->getUrl($pathUrl,$contentUrl,$attribute->attributeId,null) }}">不限</a></li>
                        @foreach($attributeValues->attributeValues($attribute->attributeId) as $attributeValue)
                        <li @if($urlDeal->active($contentUrl,$attribute->attributeId,$attributeValue->attributeValueId)) class="active" @endif><a href="{{ $urlDeal->getUrl($pathUrl,$contentUrl,$attribute->attributeId,$attributeValue->attributeValueId) }}">{{ $attributeValue->attributeValue }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
            <!--手机品牌 end-->

            <!--更多选项 start-->
            <div class="all_list_more">
                <span>更多选项<i>&gt;</i></span>
                <div class="list_more_div">
                    <ul>
                        @foreach($attributeDowns as $attributeDown)
                        <li>
                            <span>{{ $attributeDown->name }}</span>
                            <div class="list_more_content">
                                <a @if($urlDeal->activeFirst($contentUrl,$attributeDown->attributeId)) class="active" @endif href="{{ $urlDeal->getUrl($pathUrl,$contentUrl,$attributeDown->attributeId,null) }}">不限</a>
                                @foreach($attributeValues->attributeValues($attributeDown->attributeId) as $attributeValue)
                                <a @if($urlDeal->active($contentUrl,$attributeDown->attributeId,$attributeValue->attributeValueId)) class="active" @endif href="{{ $urlDeal->getUrl($pathUrl,$contentUrl,$attributeDown->attributeId,$attributeValue->attributeValueId) }}">{{ $attributeValue->attributeValue }}</a>
                                @endforeach
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--更多选项 end-->
        </div>
        <!--产品选项 end-->


        <div class="goods_display">
            <div class="goods_display_header">
                <div class="sort">
                    <ul>
                        <li><a href="{{ $pathUrl }}?order=hot">热门<i>&#8595;</i></a></li>
                        <li><a href="{{ $pathUrl }}?order=addTime">时间<i>&#8595;</i></a></li>
                        <li><a href="{{ $pathUrl }}?order=marketPrice">价格<i>&#8595;</i></a></li>
                    </ul>
                </div>
                {{--<div class="pages">--}}
                    {{--<i>&lt;</i>--}}
                    {{--<span>59/300</span>--}}
                    {{--<i>&gt;</i>--}}
                {{--</div>--}}
            </div>

            <!--产品循环 start-->
            <div class="category_list">
                <ul>
                    @foreach($categorys as $category)
                    <li>
                        <a href="/product-{{ $category->productId }}.html">
                            <img src="{{ $urlDeal->getProductUrl($category->productId) }}">
                            <h4>{{ $category->name }}</h4>
                            <p>{{ $category->brief }}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!--产品循环 end-->

            <!--分页 start-->
            <div class="guide_paging">
                {{ $categorys->links() }}
            </div>
            <!--分页 end-->
        </div>

    </div>
</div>
<!--手机大全 end-->