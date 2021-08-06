<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cate_New;
use App\Models\News;
use DB;

class NewsController extends Controller
{
    public  function index(){
        $cate_product = Category::all();

        $cate_new = Cate_New::all();

        $new = News::orderBy('id', 'asc')->paginate(3);

        $recent_posts = News::orderByDesc('created_at')->paginate(3);

        return view('frontend.new.index', compact('new','cate_new','recent_posts','cate_product'));
    }

    public function newDetail($slug){
        $cate_product = Category::all();

        $cate_new = Cate_New::all();

        $recent_posts = News::orderByDesc('created_at')->paginate(3);

        $new_detail = News::where('slug',$slug)->first();
        
        $related_new = DB::table('news')
        ->where('catenew_id',$new_detail->catenew_id)
        ->whereNotIn('news.id',[$new_detail->id])->get();

        return view('frontend.new.new_detail',compact('new_detail','cate_new', 'cate_product', 'recent_posts', 'related_new'));
    }

    public function showCate_new_id($slug){

        $cate_product = Category::all();

        $cate_new = Cate_New::all();

        $recent_posts = News::orderByDesc('created_at')->paginate(3);

        $cate_id = Cate_New::where('slug', $slug)->first();
        
        $cate_new_id = DB::table('news')
        ->where('catenew_id',$cate_id->id)->paginate(1);

        return view('frontend.new.cate_new',compact('cate_new_id','cate_new','recent_posts', 'cate_product', 'cate_id'));
    }
}
