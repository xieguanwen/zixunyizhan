<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/8
 * Time: 16:20
 */

namespace App\Providers;

use App\Models\AttributeValue;
use App\Models\ProductAttribute;

class Category {
    /**
     * @param $attributeId
     */
    public function attributeValues($attributeId){
        return AttributeValue::where('attributeId',$attributeId)->get();
    }

    /**
     * @param $attributeId
     */
    public function getAttributeValue($attributeValueId){
        return AttributeValue::where('attributeValueId',$attributeValueId)->get();
    }


    public function getAttrName($productId,$attributeId){
        $productAttribute = ProductAttribute::where('productId',$productId)->where('attributeId',$attributeId)->get();
        if(empty($productAttribute[0])){
            return '';
        }
        $attributeValue = AttributeValue::where('attributeValueId',$productAttribute[0]->attributeValueId)->get();
        return $attributeValue[0]->attributeValue;
    }
}