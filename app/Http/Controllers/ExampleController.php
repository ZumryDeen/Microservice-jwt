<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function hello(){

        return "hellow world";


    }


    public function withParameter(Request $request){

        $id = $request->id;
        $name = $request->name;
        echo "Id is :".$id;
        echo "name is". $name;

        return response()->json(['id'=>$id,'name'=>$name]);
    }

    //
}
