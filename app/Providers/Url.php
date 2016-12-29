<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/8
 * Time: 17:29
 */

namespace App\Providers;


use App\Models\ProductImage;

class Url {
    public function getUrl($pathUrl,$content,$attributeId,$attributeValueId){
//        if(empty($attributeValueId)){
//            return config("app.url").$pathUrl;
//        } else {
            $contentUrl = $this->dealWith($content,$attributeId,$attributeValueId);
            return config("app.url").'/all'.$contentUrl;
//        }
    }

    /**
     * @param $pathUrl
     * @param $content
     * @param $attributeId
     * @param $attributeValueId
     */
    public function activeFirst($content,$attributeId){
        $arrayContents = explode('-',$content);
        $pattern = '/c'.$attributeId.'(?:v.+|$)/';
        $result = true;
        foreach($arrayContents as $contentStr){
            if(preg_match($pattern,$contentStr)){
                $result = false;
                break;
            }
        }
        return $result;
    }

    /**
     * @param $pathUrl
     * @param $content
     * @param $attributeId
     * @param $attributeValueId
     */
    public function active($content,$attributeId,$attributeValueId){
        $arrayContents = explode('-',$content);
        $pattern = '/^c'.$attributeId.'v'.$attributeValueId.'$/';
        $result = false;
        foreach($arrayContents as $contentStr){
            if(preg_match($pattern,$contentStr)){
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param $productId
     * @return null|string
     */
    public function getProductUrl($productId){
        $result = null;
        $image = ProductImage::where('productId',$productId)->take(1)->get();
        if(isset($image[0])){
            $result = config('app.url').'/'.trim($image[0]->img,'/');
        } else {
            $result = config('app.url').'/img/img.jpg';
        }
        return $result;
    }

    /**
     * @param $productId
     * @return null|string
     */
    public function getProductImageUrl($productId,$imageSize=1){
        $result = null;
        $image = ProductImage::where('productId',$productId)->take(1)->get();
        if(isset($image[0])){
            $result = config('app.url').'/'.trim($image[0]->original,'/');
        } else {
            $result = config('app.url').'/img/img.jpg';
        }
        return $result;
    }

    /**
     *
     * @param $content
     * @return array
     */
    private function dealWith($content,$attributeId,$attributeValueId){
        $arrayContents = explode('-',$content);
        $pattern = '/c'.$attributeId.'(?:v.+|$)/';
        $result = [];
        foreach($arrayContents as $key=>$contentStr){
            if(!preg_match($pattern,$contentStr)){
                $result[] = $contentStr;
            }
        }
        $contentUrl = implode('-',$result);
        if(!empty($attributeValueId)){
            if(empty($contentUrl)){
                $contentUrl = 'c'.$attributeId.'v'.$attributeValueId;
            } else {
                $contentUrl = $contentUrl .'-c'.$attributeId.'v'.$attributeValueId;
            }
        }
        if(!(empty($contentUrl) && empty($attributeValueId))){
            $contentUrl = '-'.$contentUrl;
        }

        return $contentUrl;
    }
}