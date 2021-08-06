<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cate_New;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    public function add_cart_ajax(Request $request)
    {
    	$data = $request->all();
    	$session_id = substr(md5(microtime()),rand(0,26),5);
    	$cart = Session::get('cart');
    	if ($cart == true) {
    		$is_vaiable = 0;
            
    		foreach ($cart as $key => $value) {
    			if ($value['product_id'] == $data['cart_id'] ) {
                    $is_vaiable++;
                    if ($data['cart_quantity'] > 1) {
                       $cart_quantity = $data['cart_quantity'] + $value['product_quantity'];
                    }else{
                    $cart_quantity = ++$value['product_quantity'];
                    }
                    unset($cart[$key]);
                    $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_id'],
                    'product_name' => $data['cart_name'],
                    'product_image' => $data['cart_image'],
                    'product_price' => $data['cart_price'],
                    'product_quantity' => $cart_quantity,
                );
                Session::put('cart', $cart);
            }
    				
    	}

    		if ($is_vaiable == 0) {
    			$cart[] = array(
    			'session_id' => $session_id,
    			'product_id' => $data['cart_id'],
    			'product_name' => $data['cart_name'],
    			'product_image' => $data['cart_image'],
    			'product_price' => $data['cart_price'],
    			'product_quantity' => $data['cart_quantity'],
    		);
    			Session::put('cart', $cart);
    		}
    	}else{
    		$cart[] = array(
    			'session_id' => $session_id,
    			'product_id' => $data['cart_id'],
    			'product_name' => $data['cart_name'],
    			'product_image' => $data['cart_image'],
    			'product_price' => $data['cart_price'],
    			'product_quantity' => $data['cart_quantity'],
    		);
    	}
    	Session::put('cart', $cart);
    	Session::save();
    }


    public function gio_hang()
    {
    	$cate_product = Category::all();
    	$cate_new = Cate_New::all();
    	return view('frontend.cart.cart_ajax', compact('cate_product','cate_new'));
    }

    public function update_cart(Request $request)
    {
    	$data = $request->all();
    	$cart = Session::get('cart');
    	if($cart==true){
    		foreach ($data['product_quantity'] as $key => $qty) {
    			foreach ($cart as $session => $value) {
    				if ($value['session_id']==$key) {
    					$cart[$session]['product_quantity'] = $qty;
    				}
    			}
    		}
    		Session::put('cart', $cart);
    		return redirect()->back()->with('message','Cập nhật sản phẩm thành công');
    	}else{
    		return redirect()->back()->with('message','Cập nhật sản phẩm thất bại');
    	}
    }

    public function delete_product($session_id)
    {
    	$cart = Session::get('cart');
    	if($cart == true)
    	{
    		foreach ($cart as $key => $value) {
    			if($value['session_id']==$session_id)
    			{
    				unset($cart[$key]);
    			}
    		}
    		Session::put('cart', $cart);
    		return redirect()->back()->with('message','Xoá sản phẩm thành công');
    	}else{
    		return redirect()->back()->with('message','Xoá sản phẩm thất bại');
    	}
    }
    public function delete_all_product()
    {
    	$cart = Session::get('cart');
    	if($cart == true)
    	{
    		Session::forget('cart');
    		return redirect()->back()->with('message','Xoá hết giỏ hàng thành công');
    	}else{
    		return redirect()->back()->with('message','Xoá hết giỏ hàng thất bại');
    	}
    }
}
