<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function search(Request $request){
        $data = [];
        $keyword = trim($request->get('keyword'));
        $data['keyword'] = $keyword;
        $data['products'] = Product::where('name','like','%'.$keyword.'%')->paginate(10)->addQuery("keyword",$keyword);
//        dd($data['products']);
        $data['articles'] = Article::where('title','like','%'.$keyword.'%')->paginate(10)->addQuery("keyword",$keyword);
        return view("search",$data);
    }
}