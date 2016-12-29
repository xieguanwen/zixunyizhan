<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSelect extends Model
{
    public $timestamps = false;
    protected $table = "product_select";
    protected $primaryKey = "productId";
}
