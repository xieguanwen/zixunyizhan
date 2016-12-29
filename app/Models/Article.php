<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 13:57
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    protected $primaryKey = "articleId";
}