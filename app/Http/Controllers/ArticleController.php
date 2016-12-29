<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 14:37
 */

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class ArticleController extends Controller
{
    //选购详情
    const PURCHAS_DETAILS = 1;
    public function item(){
//        $data = ArticleCategory::all();
        $data = ArticleCategory::where('articleCategoryId',1)->get();
        dd($data);
    }

    public function load($articleId,Request $request){
        $articles = Article::where("articleId",$articleId)->get();
        if(!empty($articles[0])){
            $data['article'] = $articles[0];
            $data['purchases'] = Article::where('articleCategoryId',self::PURCHAS_DETAILS)->take(10)->get();
            $data['recommends'] = Article::orderBy("addTime","desc")->take(10)->get();
        } else {
            return view("errors.404");
        }
        return view("article.article",$data);

    }
}