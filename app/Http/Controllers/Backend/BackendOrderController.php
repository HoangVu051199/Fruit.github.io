<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;

class BackendOrderController extends Controller
{
    public function orderConfirmation()
    {

        $confirmation = Order::orderBy('id', 'DESC')->where('status', 0)
            ->get();

        return view('backend.order.order_confirmation', compact('confirmation'));
    }

    public function shipping()
    {

        $shipping = Order::orderBy('id', 'DESC')->where('status', 1)
            ->get();

        return view('backend.order.shipping', compact('shipping'));
    }

    public function orders()
    {

        $order = Order::orderBy('id', 'DESC')->where('status', 2)
            ->get();

        return view('backend.order.order', compact('order'));
    }

    public function countermand()
    {

        $countermand = Order::orderBy('id', 'DESC')->where('status', 3)
            ->get();

        return view('backend.order.countermand', compact('countermand'));
    }
}

