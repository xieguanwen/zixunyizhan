<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/16
 * Time: 14:13
 */
namespace App\Providers;

use App\Models\Links;

class Link {
    public function getLinks(){
        return Links::all();
    }

}