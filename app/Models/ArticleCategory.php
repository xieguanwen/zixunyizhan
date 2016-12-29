<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 14:49
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = "article_category";
    protected $primaryKey = "articleCategoryId";
    protected $perPage = 10;
}