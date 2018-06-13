<?php

namespace App\Http\Controllers;

use App\good__orders;
use App\Goods;
use App\Orders;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class OrdersController extends Controller
{
    public function buyAction($id)
    {
        $product = Goods::find($id);
        if ($product) {
            return view('order', ['goods_id' => $id]);

        }
    }


    public function getCheckout()
    {
        return view('order.checkout');
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->back();
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $order = new Orders();
        $order->customer_name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->city = $request->input('City');
        $order->qty = $cart->totalQty;
        $order->sum = $cart->totalPrice;
       if($order->save()) {
           $this->saveOrderItems($cart->items, $order->id);
           return view('order.goodsShipped');
       }
        return redirect()->back();
    }

    public function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $product) {
            $orderitems = new good__orders();
            $orderitems->order_id = $order_id;
            $orderitems->goods_id = $id;
            $orderitems->name = $product['item']['name'];
            $orderitems->price = $product['item']['price'];
            $orderitems->qty_item = $product['qty'];
            $orderitems->sum_item = $product['qty'] * $product['item']['price'];
            $orderitems->save();
        }
    }
}
