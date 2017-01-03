<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductSelect;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $attributeArray = [2=>'brand',3=>'attr_price',4=>'screen_size',5=>'internet',6=>'characteristic',
        7=>'rear_camera',8=>'appearance_color',9=>'ram_capacity',10=>'rom_capacity',11=>'number_of_cores',
        13=>'battery_capacity',14=>'main_screen',15=>'operating_system'];

    public function index(Request $request){
//        dd($_SERVER['REDIRECT_URL']);
////        dd($_SERVER['REQUEST_URI']);
        $data = [];
        $data['attributes'] = Attribute::where('erase',0)->orderBy("sort","asc")->take(8)->get();
        $data['attributeDowns'] = Attribute::where('erase',0)->orderBy("sort","asc")->offset(9)->limit(10)->get();
        $data['pathUrl'] = explode('?',$_SERVER['REQUEST_URI'])[0];
        $data['contentUrl'] = null;
//        $sql = "select * from product ";
        if(array_search($request->get('order'),['sort','marketPrice','addTime'])){
            $order = $request->get('order');
        } else {
            $order= "addTime";
        }

        $data['categorys'] = DB::table("product")->orderBy($order,'desc')->paginate(12);
//        $data['categorys'] = Product::simplePaginate(2);
        return view("product.all",$data);
    }

    public function item($content,Request $request){
        if(array_search($request->get('order'),['sort','marketPrice','addTime'])){
            $order = $request->get('order');
        } else {
            $order= "addTime";
        }
        $data = [];
        $data['attributes'] = Attribute::where('erase',0)->orderBy("sort","asc")->take(8)->get();
        $data['attributeDowns'] = Attribute::where('erase',0)->orderBy("sort","asc")->offset(9)->limit(10)->get();
        $data['pathUrl'] = explode('?',$_SERVER['REQUEST_URI'])[0];
        $data['contentUrl'] = $content;

        $model = ProductSelect::orderBy($order,'desc');
        foreach($this->getAttributeValue($content) as $key=>$value){
            $model->where($key,$value);
        }
        $data['categorys'] = $model->paginate(12);
        return view("product.all",$data);
    }

    private function getAttributeValue($content){
        $arrayContents = explode('-',$content);
        $return = [];
        foreach($arrayContents as $arrayContent){
            $arrayContent = trim($arrayContent,'c');
            $cv = explode('v',$arrayContent);
            if(isset($this->attributeArray[$cv[0]])){
                $return[$this->attributeArray[$cv[0]]] = $cv[1];
            }
        }
        return $return;
    }
}
