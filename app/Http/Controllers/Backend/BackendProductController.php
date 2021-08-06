<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class BackendProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index');
    }

    public function create()
    {
        // $user = Auth::User();

        // if($user->hasPermission('xem-sản-phẩm'))
        // {
        $category = Category::all();

        $unit = Unit::all();

        return view('backend.product.create', compact('category', 'unit'));
        // }

        // return view('backend.error.403');
    }

    public function store(BackendProductRequest $request)
    {
        $img = '';
        if ($request->has('image'))
        {
            $image = $request->file('image');
            $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                ->extension();
            $image->move(public_path() . '/files' . '/uploads' . '/images', $img);
        }

        Product::create([
            'category_id' => $request->category_id, 
            'unit_id' => $request->unit_id, 
            'name' => $request->name, 
            'slug' => Str::slug($request->name), 
            'image' => $img, 
            'price' => $request->price, 
            'origin' => $request->origin, 
            'description' => $request->description, 
            'hot' => $request->hot, 
            'status' => $request->status, 
        ]);

        return redirect('/product')
            ->with('Success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $category = Category::all();

        $unit = Unit::all();

        $product = Product::findOrFail($id);

        return view('backend.product.update', compact('product', 'category', 'unit'));
    }

    public function update(BackendProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->origin = $request->origin;
        $product->description = $request->description;
        $product->hot = $request->hot;
        $product->status = $request->status;
        
        $img = '';
        if (!empty($request->has('image')))
        {
            $image = $request->file('image');
            $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                ->extension();
            $image->move(public_path() . '/files' . '/uploads' . '/images', $img);

            $product->image = $img;
        }

        $product->update();

        return redirect('/product')
            ->with('Success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/product')
            ->with('Success', 'Xoá thành công');
    }
}

