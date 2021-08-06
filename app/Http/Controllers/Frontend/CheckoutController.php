<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Cate_New;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Order_Detail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FrontendCheckoutRequest;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
    	$cate_product = Category::all();
    	$cate_new = Cate_New::all();
    	$provinces = Provinces::orderBy('matp', 'ASC')->get();
        $order_detail = Order_Detail::orderBy('id', 'ASC')->get();

    	return view('frontend.checkout.checkout', compact('cate_product','cate_new','provinces','order_detail'));
    }

    public function home_select_delivery(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="provinces"){
                $select_province = Districts::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>__Chọn Quận / Huyện__</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>__Chọn Phường / Xã__</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
            echo $output;
        }
    }

    public function calculate_delivery(Request $request)
    {
    	$data = $request->all();
    	if($data['matp']){
    		$feeship = Feeship::where('matp', $data['matp'])
    		->where('maqh', $data['maqh'])
    		->where('xaid', $data['xaid'])->get();
    		foreach ($feeship as $key => $fee) {
    			Session::put('fee', $fee->feeship);
    			Session::save();
    		}
    	}
    }

    public function select_feeship(){
        $feeship = Session::get('fee');
        $output = '';
        if($feeship==true){
        $output.='<th><span><strong>Phí vận chuyển :</strong></span></th>';
            
        $output.='<td>
        <input class="total" style="border:0px solid #ededed;" name="feeship" value="'.number_format($feeship,0,',','.').'đ" type="text" ></td>';
		}
            echo $output;       
    }

    public function home_total_feeship()
    {
        $feeship = Session::get('fee');
        $output = '';
        if($feeship==true){

            $total = 0;
                foreach(Session::get('cart') as $key => $value){
                $subtotal = $value['product_price']*$value['product_quantity'];
                $total+=$subtotal;
                }
                $total += Session::get('fee');                            
        $output.='<th><span><strong>Tổng tiền :</strong></span></th>';  
        $output.='<td>
                    <input class="total" style="border:0px solid #ededed;" name="total" value="'.number_format($total,0,',','.').'đ" type="text" >
        </td>';
        }
            echo $output;
    }

    public function order_confirm(FrontendCheckoutRequest $request)
    {

        $cate_product = Category::all();
        $cate_new = Cate_New::all();

        $data = $request->all(); 
    
        if ($request->payment_method == 0) {

        $order = new Order();
        
        if (Auth::user()) {
            $order->user_id = Auth::user()->id;
        }else{
            $order->user_id = NULL;
        }

        $order->customer_name = $data['customer_name'];
        $order->customer_phone = $data['customer_phone'];
        $order->customer_email = $data['customer_email'];
        $order->customer_address = $data['customer_address'];
        $order->provinces_id = $data['provinces'];
        $order->districts_id = $data['districts'];
        $order->wards_id = $data['wards'];
        $order->customer_note = $data['customer_note'];
        $order->payment_method = $data['payment_method'];

        $order->save();

        $order_code = substr(md5(microtime()),rand(0,26),5);

        foreach (Session::get('cart') as $key => $cart) {
            $order_detail = new Order_Detail();
            $order_detail->order_id = $order->id;
            $order_detail->order_code = $order_code;
            $order_detail->product_id = $cart['product_id'];
            $order_detail->product_name = $cart['product_name'];
            $order_detail->product_price = $cart['product_price'];
            $order_detail->product_quantity = $cart['product_quantity'];
            $order_detail->product_feeship = $data['feeship'];

            $order_detail->save();

        }
        Session::forget('fee');
        Session::forget('cart');
        return view('frontend.checkout.order_success', compact('cate_product','cate_new'));
    }else{
            $totalMoney = str_replace('.', '', $request->total);  
            $totalMoney = str_replace('đ', '', $totalMoney);
            session(['info_customer' => $data]);

        return view('frontend.vnpay.index', compact('totalMoney'));
        }
    }

    public function createPayment(Request $request)
    {

        $vnp_TxnRef = substr(md5(microtime()),rand(0,26),10); //Mã đơn hàng.
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
    
        if (env('VNP_HASH_SECRET')) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        if (session()->has('info_customer') && $request->vnp_ResponseCode =='00') {
                $vnpayData = $request->all();
                $data = session()->get('info_customer');
                
                $order = new Order();
        
                if (Auth::user()) {
                    $order->user_id = Auth::user()->id;
                }else{
                    $order->user_id = NULL;
                }

                $order->customer_name = $data['customer_name'];
                $order->customer_phone = $data['customer_phone'];
                $order->customer_email = $data['customer_email'];
                $order->customer_address = $data['customer_address'];
                $order->provinces_id = $data['provinces'];
                $order->districts_id = $data['districts'];
                $order->wards_id = $data['wards'];
                $order->customer_note = $data['customer_note'];
                $order->payment_method = $data['payment_method'];

                $order->save();
                
                if ($order->id) {
                    $order_code = substr(md5(microtime()),rand(0,26),5);
                    
                    foreach (Session::get('cart') as $key => $cart) {
                    $order_detail = new Order_Detail();
                    $order_detail->order_id = $order->id;
                    $order_detail->order_code = $order_code;
                    $order_detail->product_id = $cart['product_id'];
                    $order_detail->product_name = $cart['product_name'];
                    $order_detail->product_price = $cart['product_price'];
                    $order_detail->product_quantity = $cart['product_quantity'];
                    $order_detail->product_feeship = $data['feeship'];

                    $order_detail->save();

                    }

                    $payment = new Payment();
        
                    if (Auth::user()) {
                        $payment->user_id = Auth::user()->id;
                    }else{
                        $payment->user_id = NULL;
                    }

                    $payment->order_id = $order->id;
                    $payment->money = $vnpayData['vnp_Amount'];
                    $payment->code = $vnpayData['vnp_TxnRef'];
                    $payment->note = $vnpayData['vnp_OrderInfo'];
                    $payment->vnp_response_code = $vnpayData['vnp_ResponseCode'];
                    $payment->code_vnpay = $vnpayData['vnp_TransactionNo'];
                    $payment->code_bank = $vnpayData['vnp_BankCode'];
                    $payment->time = date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate']));

                    $payment->save();
                }

                Session::forget('fee');
                Session::forget('cart');

                return view('frontend.vnpay.vnpay_return', compact('vnpayData'));
        }else{
            \Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Đã xảy ra lỗi không thể thanh toán đơn hàng'
            ]);
            return redirect()->to('/');
        }
    }
}
