<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cate_New;
use App\Models\Product;
use App\Models\Image_Product;
use App\Models\News;
use DB;

class ProductController extends Controller
{
    public function index()
    {

        $cate_product = Category::all();

        $cate_new = Cate_New::all();

        $product = Product::orderBy('id', 'ASC')->paginate(3);

        $recent_posts = News::orderByDesc('created_at')->get();

        return view('frontend.product.index', compact('cate_product','cate_new', 'product', 'recent_posts'));
    }

    public function showCate_product_id($slug)
    {

    	$cate_product = Category::all();

        $cate_new = Cate_New::all();

        $recent_posts = News::orderByDesc('created_at')->get();

        $category_id = Category::where('slug', $slug)->first();

        $cate_product_id = Product::orderBy('id', 'DESC')
        ->where('category_id', $category_id->id)->paginate(3);

        return view('frontend.product.cate_product', compact('cate_product','cate_new', 'recent_posts', 'cate_product_id', 'category_id'));
    }

    public function productDetail($slug){

    	$cate_product = Category::all();

        $cate_new = Cate_New::all();

        $recent_posts = News::orderByDesc('created_at')->get();

        $product_detail = DB::table('product')
        ->where('slug',$slug)->first();

        $related_product = Product::with('category')
        ->where('category_id', $product_detail->category_id)
        ->whereNotIn('id', [$product_detail->id])->get();

        $image_product = Image_Product::with('image_product')
        ->where('product_id', $product_detail->id)
        ->get();

    	return view('frontend.product.product_detail', compact('cate_product','cate_new', 'recent_posts', 'product_detail', 'related_product', 'image_product'));
    }

}
