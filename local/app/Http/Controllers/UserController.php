<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    function DeleteUser(Request $request) {
        $id=$request->Input('Id');
        DB::delete('delete from users where id = ?',[$id]) ;
        return redirect()->back();
    }


    function UploadUser(Request $request){
        $itemId=$request->Input('itemId');
        $newHit=$request->Input('adm');
        DB::table('users')
            ->where('id',$itemId)
            ->update( array('role'=>$newHit)
            );
        return redirect()->back();
    }


}

