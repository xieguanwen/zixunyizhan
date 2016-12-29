<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/21
 * Time: 9:41
 */
namespace App\Providers;

use App\Models\Search as SearchModel;

class Search {
    public function getHotSearch($number = 5){
        return SearchModel::take($number)->get();
    }
}