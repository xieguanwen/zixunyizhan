<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/20
 * Time: 10:23
 */

namespace App\Http\Controllers;


use App\Models\Ad;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\HomeRecommend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(Request $request){
//        if ($request->getMethod() == 'POST')
//        {
//            $rules = ['captcha' => 'required|captcha'];
//            $validator = Validator::make(Input::all(), $rules);
//            if ($validator->fails())
//            {
//                echo '<p style="color: #ff0000;">Incorrect!</p>';
//            }
//            else
//            {
//                echo '<p style="color: #00ff30;">Matched :)</p>';
//            }
//            exit();
//        }

//        $data['articleCategorys'] = ArticleCategory::all()->take(2);
//        $data['articleCategorys'] = DB::select("select * from article_category WHERE parentId = ? limit 2",[0]);
//        $data['imageBlockBanners'] = DB::select("select * from ad WHERE position = 1 limit 3");
        //广告
        $data['imageBlockBanners'] = Ad::where('position',1)->take(3)->get();
        $data['articleImageTop'] = Ad::where('position',2)->take(1)->get();
        $data['articleImageLeft'] = Ad::where('position',3)->take(1)->get();
        $data['articleImageBottom'] = Ad::where('position',4)->take(1)->get();

        //头条
        $data["headlines"] = HomeRecommend::where('type',1)->take(2)->get();
        //热点 Hot spots
        $data["hotSpotsFirst"] = HomeRecommend::where(['type'=>2,'first'=>1])->take(1)->get();
        //热点 Hot spots
        $data["hotSpots"] = HomeRecommend::where(['type'=>2,'first'=>0])->orderBy('sort','desc')->take(8)->get();
        //新闻 news
        $data["newsTopFirst"] = HomeRecommend::where(['type'=>3,'first'=>1])->take(1)->get();
        //新闻 news
        $data["newsTops"] = HomeRecommend::where(['type'=>3,'first'=>0])->orderBy('sort','desc')->take(10)->get();

        //导读
        $data["introductionLefts"] = DB::select("select hr.*,a.source from home_recommend AS hr , article AS a WHERE hr.articleId = a.articleId AND hr.type = 4 ORDER BY hr.homeRecommendId ASC limit 0,2");
        //导读
        $data["introductionCenters"] = DB::select("select hr.*,a.source from home_recommend AS hr , article AS a WHERE hr.articleId = a.articleId AND hr.type = 4 ORDER BY hr.homeRecommendId ASC limit 2,2");
        //导读 一周热点 Hot week
        $data["hotWeeks"] = HomeRecommend::where(["type"=>5])->orderBy('sort','desc')->take(4)->get();
        //导读 话题 subject
        $data["subjects"] = HomeRecommend::where(["type"=>6])->orderBy('sort','desc')->take(3)->get();


        //手机资讯 articleCategoryId=1
        $data['mobileInformations'] = Article::where('articleCategoryId',1)->take(10)->get();
        //手机导购 articleCategoryId=2
        $data['mobileShoppingGuides'] = Article::where('articleCategoryId',2)->take(10)->get();
        //手机测评 articleCategoryId=3
        $data['mobileTests'] = Article::where('articleCategoryId',3)->take(10)->get();
        //手机杂谈 articleCategoryId=4
        $data['mobileTalks'] = Article::where('articleCategoryId',4)->take(10)->get();

        //热门手机
        $data = array_merge($data,$this->getProduct());

        return view('index',$data);
    }

    /**
     * 产品
     * @return array
     */
    protected function getProduct($attributeId = 2){
        $productArr = ["productHot"=>[],"product1"=>[],"product2"=>[],"product3"=>[]];
        $attributeMobiles = DB::select("select attributeValueId,attributeValue from attribute_value WHERE attributeId = $attributeId");
        foreach($attributeMobiles as $attributeMobile){
            //$attributeMobile->attributeValue;
            $productArr['productHot'][$attributeMobile->attributeValue] = [];
            $productArr['product1'][$attributeMobile->attributeValue] = [];
            $productArr['product2'][$attributeMobile->attributeValue] = [];
            $productArr['product3'][$attributeMobile->attributeValue] = [];

            $productObjects = DB::select("select p.productId,p.name,p.marketPrice from product AS p ,product_attribute AS pa WHERE p.productId = pa.productId AND pa.attributeValueId = {$attributeMobile->attributeValueId}");
            foreach($productObjects as $productObject){
                if(count($productArr['productHot'][$attributeMobile->attributeValue])<3){
                    $productArr['productHot'][$attributeMobile->attributeValue][] = $productObject;
                }

                if(count($productArr['product1'][$attributeMobile->attributeValue])<3 && intval($productObject->marketPrice)<1000) {
                    $productArr['product1'][$attributeMobile->attributeValue][] = $productObject;
                } else if(count($productArr['product2'][$attributeMobile->attributeValue])<3 && intval($productObject->marketPrice)>1000 && intval($productObject->marketPrice)<=2000){
                    $productArr['product2'][$attributeMobile->attributeValue][] = $productObject;
                } else if(count($productArr['product3'][$attributeMobile->attributeValue])<3 && intval($productObject->marketPrice)>2000 && intval($productObject->marketPrice)<=3000){
                    $productArr['product3'][$attributeMobile->attributeValue][] = $productObject;
                }
            }
        }
        return $productArr;
    }

}

