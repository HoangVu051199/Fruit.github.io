<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class BackendHomeController extends Controller
{
    public function index()
    {

        $countProduct = Product::select('id')->count();

        $countUser = User::select('id')->count();


        $confirmation  = Order::orderBy('id', 'DESC')->where('status', 0)
            ->get();
            

        $countNew = News::select('id')->count();

        $count = DB::table('detail_promotion')
         ->join('promotion_product', 'promotion_product.id', '=', 'detail_promotion.promotion_id')->where('status', 1)->count();
         
        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        return view('backend.dashboard.index', compact('countProduct', 'countUser', 'countNew', 'dt', 'confirmation', 'count'));
    }


    public function create()
    {
        //
        
    }

    public function store(Request $request)
    {
        //
        
    }

    public function edit($id)
    {
        $countmand = Order::findOrFail($id);
        return view('backend.order.update_countermand', compact('countmand'));   
    }

    public function update(Request $request, $id)
    {
        $countmand = Order::findOrFail($id);

        $countmand->update([
            'status' => $request->status,
         ]);

        return redirect()
            ->route('admin.index')
            ->with('Success', 'Sửa thành công');
        
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        $order_detail = Order_Detail::orderBy('id', 'DESC')
        ->where('order_id', $order->id)->get();

        return view('backend.order.detail_countmand', compact('order', 'order_detail'));
    }

    public function destroy($id)
    {
        //
        
    }
}

