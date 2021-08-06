<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Brian2694\Toastr\Facades\Toastr;

class BackendCategoryController extends Controller
{

    public function index()
    {
        return view('backend.category.index');
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(BackendCategoryRequest $request)
    {
        try{
            Category::create([
            'name' => $request->name, 
            'slug' => Str::slug($request->name), 
            'status' => $request->status
        ]);

        return redirect()->route('category.index')->with('Success', 'Thêm thành công');

        }catch(\Exception $exception){

            Toastr::error('Đã xảy ra lỗi lưu dữ liệu', 'Success');

            return redirect()->back();
        }
        
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.category.update', compact('category'));
    }

    public function update(BackendCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name, 
            'slug' => Str::slug($request->name),
             'status' => $request->status
         ]);

        return redirect()
            ->route('category.index')
            ->with('Success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->back()
            ->with('Success', 'Xoá thành công');
    }
}

