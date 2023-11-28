<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shopifyController extends Controller
{
    function sayHi($name=''){
        //return response("Hi {$name}",200);
        return view('shopify',['name'=>$name]);
    }

    function managePostRequest(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        return response("Output of Post request is this message - {$name} - {$email}",200);

    }
}
