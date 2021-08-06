<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate_New;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
    	$cate_product = Category::all();

        $cate_new = Cate_New::all();

        return view('frontend.contact.index', compact('cate_new','cate_product'));
    }
}
