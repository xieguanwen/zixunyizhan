<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductSelect;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    const PRODUCT_COLOR = 8;
    private $attributeArray = [2=>'brand',3=>'attr_price',4=>'screen_size',5=>'internet',6=>'characteristic',
        7=>'rear_camera',8=>'appearance_color',9=>'ram_capacity',10=>'rom_capacity',11=>'number_of_cores',
        13=>'battery_capacity',14=>'main_screen',15=>'operating_system'];

    public function item($id,Request $request){
        dd($id);
    }

    public function load($id,Request $request){
        $data = [];
        $data['product'] = Product::where('productId',$id)->get()[0];
//        dd(json_decode($data['product']->productAttributeJson));
        $data['productImages'] = ProductImage::where('productId',$id)->get();
        $data['productColors'] = ProductAttribute::where('productId',$id)->where('attributeId',self::PRODUCT_COLOR)->get();
        $data['newses'] = Article::orderBy("addTime","desc")->take(6)->get();
        return view("product.product",$data);
    }

    /**
     * @param null $id
     */
    public function addBatch($id = null){
        set_time_limit(18000);
        if( $id == null || intval($id)== 0 ){
            $products = Product::all();
        } else {
            $products = Product::where('productId','>',$id);
        }

        foreach ($products as $product) {
            $productSelect = new ProductSelect();
            foreach ($product->toArray() as $key=>$value) {
                $productSelect->setAttribute($key,$value);
            }
            $productAttributes = ProductAttribute::where('productId',$product->productId)->get();
            foreach ($productAttributes as $productAttribute) {
                $productSelect->setAttribute($this->attributeArray[$productAttribute->attributeId],$productAttribute->attributeValueId);
            }
            $productSelect->save();
        }
        print_r('addBatch is ok!');
        exit;
    }
}
