<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function itemAjax(Request $request){
        $request->input();
        return response(array('test'=>array(1,2)),200);
    }
}
