<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendUnitRequest;
use App\Models\Unit;

class BackendUnitController extends Controller
{
    public function index()
    {
        return view('backend.unit.index');
    }

    public function create()
    {
        return view('backend.unit.create');
    }

    public function store(BackendUnitRequest $request)
    {
        Unit::create([
            'name' => $request->name, 
            'description' => $request->description, 
        ]);

        return redirect()
            ->route('unit.index')
            ->with('Success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('backend.unit.update', compact('unit'));
    }

    public function update(BackendUnitRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $unit->update([
            'name' => $request->name, 
            'description' => $request->description, 
        ]);

        return redirect()
            ->route('unit.index')
            ->with('Success', ' Sửa thành công');
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        $unit->delete();

        return redirect()
            ->route('unit.index')
            ->with('Success', 'Xoá thành công');
    }
}

