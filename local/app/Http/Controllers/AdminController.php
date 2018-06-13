<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Goods;
use App\Orders;

use App\User;
use App\good__orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware(['auth','admin']);
    }


    function  ShowAdmin(){
        return view('Admin.admin');
    }

    function  addnewcatAction(Request $request){
        $catName= $request->input('CategoryName');
        $catParentId=0;
        $catParentId=$request->input('Parent_id');

        $id = DB::table('categories')->insertGetId(
            array('name' => $catName,'latin_url'=>$catName,'parent_id' => $catParentId)
        );

        return redirect()->back();

    }
 function ShowCategory(){
     $rsCategories= Categories::where('parent_id','=',0)->get();
     $Categories= DB::table('categories')
         ->orderBy('parent_id', 'ASC')
         ->get();
    return view('Admin.adminCategory',['category'=>$rsCategories,'getcategory'=>$Categories]);
}

    function  updateCategory(Request $request){
        $itemId=$request->Input('itemId');
        $parentid=$request->Input('parentId');
        $newName=$request->Input('newName');
        DB::table('categories')
            ->where('id',$itemId)
            ->update( array('name' => $newName,'latin_url'=>$newName,'parent_id' => $parentid));
        return redirect()->back();
    }

    function DeleteCategory(Request $request){
        $id=$request->Input('Id');
        DB::delete('delete from categories where id = ?',[$id]) ;
        return redirect()->back();
    }

    function ShowProducts(){
        $rsqCategories= Categories::where('parent_id','!=',0)->get();
        $product=Goods::all();

        return view('Admin.adminProducts',['category'=>$rsqCategories,'product'=>$product]);
    }

    function  addProducts(Request $request){
        $name=$request->Input('name');
        $price=$request->Input('price');
        $category=$request->Input('category');
        $Description=$request->Input('Description');
        $URL=$request->Input('URL');
        $id = DB::table('goods')->insertGetId(
            array('name' => $name,'category_id'=>$category,'description' => $Description,'price'=>$price,'latin_url'=>$URL,'Image_url'=>'','hit'=>0)
        );

    }


    function  updateProduct(Request $request){
        $newName=$request->Input('Name');
        $newPrice=$request->Input('Price');
        $newCategory=$request->Input('Category');
        $newDescription=$request->Input('Description');
        $newURL=$request->Input('URL');
        $itemId=$request->Input('itemId');
        $newHit=$request->Input('hit');
        DB::table('goods')
            ->where('id',$itemId)
            ->update( array('name' => $newName,'category_id'=>$newCategory,'description' => $newDescription,'price'=>$newPrice,'latin_url'=>$newURL,'hit'=>$newHit)
            );
        return redirect()->back();
    }



    function DeleteProduct(Request $request){
        $id=$request->Input('Id');
        DB::delete('delete from goods where id = ?',[$id]) ;
        return redirect()->back();
    }

//добавить картинку в базу

function UploadProduct(Request $request){

        $maxSize=2*1024*1024;

    $itemId=$request->Input('itemId');
    $itemName=$request->Input('itemName');
    $ext=pathinfo($_FILES['filename']['name'],PATHINFO_EXTENSION);
    //создаем имя
    $newFIleName=$itemName.'.'.$ext;

    if($_FILES['filename']['size']>$maxSize){

        echo ("Размер файла превышает два мегабайта");
         return;
        }
        //Загружен ли файл
    if(is_uploaded_file($_FILES['filename']['tmp_name'])){
        //если файл загружен то перемешает из временной директории в конечную
        $res=move_uploaded_file($_FILES['filename']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/local/resources/image/shop/mobile/'.$newFIleName);
        if($res) {
            $res = DB::table('goods')
                ->where('id', $itemId)
                ->update(array('Image_url' => $newFIleName)
                );
            if ($res) {
                return redirect()->back();
            } else {
                echo("Ошибка загрузки файла");
            }
        }

        else{
            echo ("Ошибка загрузки файла");
        }
    }
    else{
        echo ("Файл не был выбран");

    }

}

    function ShowUser(){
        $user=User::all();
        return view('Admin.adminUser',['users'=>$user]);
    }

    function ShowOrders(){
        $orders=Orders::all();
        return view('Admin.adminOrders',['order'=>$orders]);
    }


    function DeleteOrder(Request $request) {
        $id=$request->Input('Id');
        DB::delete('delete from orders where id = ?',[$id]) ;
        DB::delete('delete from good__orders where order_id = ?',[$id]) ;
        return redirect()->back();
    }
    function OrderProduct(Request $request)
    { $id=$request->Input('Id');

        $Product =good__orders::where('order_id', '=', $id)->get();
        $n=1;
        foreach ($Product as $item){

            echo $n.'.'.$item->name.' b ';
            echo " количество : ".$item->qty_item.' | ';
            $n++;

        }

    }
}

