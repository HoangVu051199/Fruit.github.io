<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class BackendSliderController extends Controller
{
    public function index()
    {
        return view('backend.slider.index');
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(BackendSliderRequest $request)
    {
        $img = '';
        if ($request->has('image'))
        {
            $image = $request->file('image');
            $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                ->extension();
            $image->move(public_path() . '/files' . '/uploads' . '/images', $img);
        }

        Slider::create([
            'image' => $img, 
            'position' => $request->position, 
            'status' => $request->status, 
        ]);

        return redirect()
            ->route('slider.index')
            ->with('Success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('backend.slider.update', compact('slider'));
    }

    public function update(BackendSliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $img = '';
        if ($request->has('image'))
        {
            $image = $request->file('image');
            $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                ->extension();
            $image->move(public_path() . '/files' . '/uploads' . '/images', $img);
        }

        $slider->update([
            'image' => $img, 
            'position' => $request->position, 
            'status' => $request->status, 
        ]);

        return redirect()
            ->route('slider.index')
            ->with('Success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->delete();

        return redirect()
            ->route('slider.index')
            ->with('Success', 'Xoá thành công');
    }
}

