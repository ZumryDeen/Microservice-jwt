<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getAllusers(){


        try {
           // DB::listen(function ($query) { dump($query->sql); dump($query->bindings); dump($query->time); });


          $result= DB::select("select * from users");
            DB::enableQueryLog();
            $queries = DB::getQueryLog();
            print_r($queries);
             // $result = DB::table('users')->all();
            return response()->json(['users'=>$result]);
        } catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }

    }


    public function createUsers(Request $request){
DB::table('users')->insertGetId(array('name'=>$request->name,'email'=>$request->email,'password'=>app('hash')->make($request->password)));
        return response()->json(['sucess'=>true]);
    }

    public function editUsers(Request $request){

        DB::listen(function ($query) { dump($query->sql); dump($query->bindings); dump($query->time); });
        try {
            DB::table('users')
                ->where('id',$request->id)
                ->update(['name'=>$request->name,'email'=>$request->email,'password'=>app('hash')->make($request->password)]);

            return response()->json(['sucess'=>true]);
        } catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }




    }

    public function deleteUsers(Request $request){
        DB::table('users')->where('id','=',$request->id)->delete();
        return response()->json(['sucess'=>true]);
    }



}
