<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cate_New;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\News;
use App\Models\Promotion_Product;
use App\Models\Detail_Promotion;
use App\Models\Order;
use App\Models\Order_Detail;
use DB;

class HomeController extends Controller
{
    public function index(){

        $cate_new = Cate_New::all();

        $cate_product = Category::all();

        $product = Product::all();

        $slider = Slider::orderBy('position', 'ASC')->get();

        $recent_posts = News::orderByDesc('created_at')->paginate(3);

        // $promotion = DB::table('detail_promotion')
        // ->join('promotion_product', 'promotion_product.id', '=', 'detail_promotion.promotion_id')->get();

        // dd($promotion);

        $promotion = Promotion_Product::get();

        return view('frontend.home.index', compact('cate_new','cate_product','slider','product', 'recent_posts','promotion' ));
    }

    public function user_order()
    {
      $cate_new = Cate_New::all();

        $cate_product = Category::all();

        $slider = Slider::all();

        $product = Product::all();

        $recent_posts = News::orderByDesc('created_at')->paginate(3);
      if (Auth::user()) {

        $user = Auth::user()->id;

        $orders = Order::where('user_id', $user)
        ->get();

      return view('frontend.user.order', compact('orders','cate_new','cate_product','slider','product', 'recent_posts'));
      }   
    }


    public function home_select_Modal(Request $request)
    {

    	$data = $request->all();
    	$output='';
    	if($data){
    	$product_detail = DB::table('product')
        ->where('id',$data['cart_id'])->get();
       
        foreach ($product_detail as $key => $item) {
            
            $output.='
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">  
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="'.$item->image.'" alt=""></a>    
                                            </div>
                                        </div>  
                                    </div>    
                                </div>  
                            </div> 
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>'.$item->name.'</h2> 
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">
                                        '.number_format($item->price, 0, ',','.').'đ
                                        </span>        
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>'.$item->description.'</p>    
                                    </div> 
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                           
                                           <p>
                                           <lable class="mr-4">
                                           Đơn vị tính
                                           </lable>
                                           <span>
                                               : kg
                                           </span>
                                           </p>
                                        </div>
                                        <div class="variants_size">
                                           <p>
                                           <lable class="mr-5">Xuất xứ</lable>
                                           <span>
                                           : '.$item->origin.'
                                           </span>
                                           </p>
                                        </div>
                                        <div class="variants_size">
                                           <p>
                                           <lable class="mr-4">
                                           Trạng thái 
                                           </lable>
                                           <span>
                                                : Còn hàng
                                           </span>
                                           </p>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form>
                                            <input type="hidden" name="_token" value="'.csrf_token().'" />
                                            <input type="hidden" value="'.$item->id.'" class="cart_id_'. $item->id.'">
                                    <input type="hidden" value="'.$item->name.'" class="cart_name_'. $item->id .'">
                                    <input type="hidden" value="'. $item->image .'" class="cart_image_'.$item->id.'">
                                    <input type="hidden" value="'. $item->price .'" class="cart_price_'.$item->id.'">
                                    <input type="hidden" value="1" class="cart_quantity_'. $item->id.'">
                                                <input min="1" max="100" value="1" type="number">
                                                <button type="button" data-id ="'.$item->id.'" class="add_to_cart">Thêm Giỏ Hàng</button>
                                            </form>
                                        </div>   
                                    </div>
                                         
                                </div>    
                            </div>    
                        </div>     
                    </div>
        ';
            }
            }
            echo $output;
        }
    }

