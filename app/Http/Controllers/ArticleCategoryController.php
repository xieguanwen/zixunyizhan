<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleCategoryController extends Controller
{
    const PAGE_NUMBER = 20;

    public function index(Request $request){
        $articles = Article::paginate(self::PAGE_NUMBER);
        $data['articles'] = $articles;
        $data['title'] = trans("article.category_title");
        $data['keywords'] = trans("article.category_keywords");
        $data['description'] = trans("article.category_description");
        return view('category.index',$data);
    }

    public function load($articleCategoryId,Request $request){
        $articles = Article::where("articleCategoryId",intval($articleCategoryId))->paginate(self::PAGE_NUMBER);
        $data['articles'] = $articles;
        $articleCategory = ArticleCategory::where("articleCategoryId",intval($articleCategoryId))->get();
        if($articleCategory[0]){
            $data['title'] = $articleCategory[0]->name;
            $data['keywords'] = $articleCategory[0]->keywords;
            $data['description'] = $articleCategory[0]->description;
        }
        return view('category.index',$data);
    }
}
