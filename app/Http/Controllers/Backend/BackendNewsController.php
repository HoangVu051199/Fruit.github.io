<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendNewsRequest;
use App\Models\Cate_New;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendNewsController extends Controller
{
    public function index()
    {
        $new = News::orderBy('id', 'asc')->get();

        return view('backend.new.index', compact('new'));
    }

    public function create()
    {
        $cate_new = Cate_New::all();

        return view('backend.new.create', compact('cate_new'));
    }

    public function store(BackendNewsRequest $request)
    {
        $img = '';
        if ($request->has('image'))
        {
            $image = $request->file('image');
            $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                ->extension();
            $image->move(public_path() . '/files' . '/uploads' . '/images', $img);
        }

        News::create([
            'catenew_id' => $request->catenew_id, 
            'title' => $request->title, 
            'slug' => Str::slug($request->title) , 
            'image' => $img, 
            'content' => $request->contents, 
            'status' => $request->status, 
        ]);

        return redirect()
            ->route('new.index')
            ->with('Success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $cate_new = Cate_New::all();

        $new = News::findOrFail($id);

        return view('backend.new.update', compact('new', 'cate_new'));
    }

    public function update(BackendNewsRequest $request, $id)
    {
        $new = News::findOrFail($id);

        $img = '';
        if ($request->has('image'))
        {
            $image = $request->file('image');
            $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-m-d-Y') . '.' . $request->file('image')
                ->extension();
            $image->move(public_path() . '/files' . '/uploads' . '/images', $img);
        }

        $new->update([
            'catenew_id' => $request->catenew_id,
            'title' => $request->title,
            'image' => $img,
            'content' => $request->contents, 
            'status' => $request->status, 
        ]);

        return redirect()
            ->route('new.index')
            ->with('Success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $new = News::findOrFail($id);

        $new->delete();

        return redirect()
            ->route('new.index')
            ->with('Success', 'Xoá thành công');
    }
}

