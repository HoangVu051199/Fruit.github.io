<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCate_NewRequest;
use App\Models\Cate_New;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendCate_NewController extends Controller
{
    public function index()
    {
        $cate_new = Cate_New::orderBy('id', 'asc')->get();

        return view('backend.cate_new.index', compact('cate_new'));
    }

    public function create()
    {
        return view('backend.cate_new.create');
    }

    public function store(BackendCate_NewRequest $request)
    {
        Cate_New::create([
            'name' => $request->name, 
            'slug' => Str::slug($request->name), 
            'status' => $request->status, 
        ]);

        return redirect()
            ->route('cate-new.index')
            ->with('Success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $cate_new = Cate_New::findOrFail($id);

        return view('backend.cate_new.update', compact('cate_new'));
    }

    public function update(BackendCate_NewRequest $request, $id)
    {
        $cate_new = Cate_New::findOrFail($id);

        $cate_new->update([
            'name' => $request->name, 
            'slug' => Str::slug($request->name), 
            'status' => $request->status, 
        ]);

        return redirect()
            ->route('cate-new.index')
            ->with('Success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $cate_new = Cate_New::findOrFail($id);

        $cate_new->delete();

        return redirect()
            ->route('cate-new.index')
            ->with('Success', 'Xoá thành công');
    }
}

