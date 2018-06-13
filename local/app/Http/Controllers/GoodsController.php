<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GoodsController extends Controller
{

    public function HitShow(){
        $product = Goods::where('hit', '=',1)->get();
        return view('layouts.main',['hit'=>$product]);

    }


    public function showAction($productName)
    {

        $product = Goods::where('latin_url', '=', $productName)->get();
        foreach ($product as $y) {
            $category_id = $y->category_id;
              $goods_id=$y->id;
            $goods_price=$y->price;
        }
        $category_product_id = Categories::where('id', '=', $category_id)->get();

        foreach ($category_product_id as $x) {
            $id_parent = $x->parent_id;
        }
        $category_parent_id = Categories::where('id', '=', $id_parent)->get();
        foreach ($category_product_id as $category_name) {
            $allgoods = Categories::where('parent_id', '=', $category_name->parent_id)->get();
            foreach ($allgoods as $x) {
                $q = ($x->id);
                $Recommended[]= DB::table('goods')
                    ->where('category_id', '=',$q)
                    ->where('id','!=', $goods_id)
                    ->where('price','<', $goods_price)
                    ->get();
                //print_r($Recommended);

            }
}
        if($product){
            return view('product',['goo'=>$product,'category_id'=>$category_product_id,'parent_id'=>$category_parent_id,'recomdation'=>$Recommended]);
        }
    }


    public  function  getAddToCart(Request $request,$id){
        $product=Goods::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);

        return redirect()->back();
        //return redirect()->route('categore.index');
        //  return redirect();
        //route('product.index');

    }

///добавить в корзину и открыть
    public  function  getAddToCartOpen(Request $request,$id){
        $product=Goods::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);

        return redirect()->route('goods.shoppongCart');
      ;

    }

    public  function  getAddToCartOpenTo(Request $request,$id,$id2){
        $product=Goods::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);

        $product=Goods::find($id2);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);

        return redirect()->route('goods.shoppongCart');
        ;

    }


    public  function  getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);

        return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }
//удалить все товары из корзину
    public  function deleteAll(){
        Session::forget('cart');
        return redirect()->back();
    }
    //удалить один товар из корзины
    public  function delete($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->GoodsDelete($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public  function  getQuantityAdd($id){

       $oldCart=Session::has('cart')?Session::get('cart'):null;
       $cart=new Cart($oldCart);
       $cart->QuantityAdd($id);
       Session::put('cart',$cart);
       return redirect()->back();
    }

    public  function  getQuantityDelete($id){

        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->QuantityDelete($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
}
