<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\BackendPermissionRequest;
use Illuminate\Support\Str;

class BackendPermissionController extends Controller
{

    public function index()
    {

        $permissions = Permission::orderBy('id', 'ASC')->paginate(5);

        return view('backend.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.permission.create');
    }

    public function store(BackendPermissionRequest $request)
    {

        Permission::create([
            'name' => Str::slug($request->display_name), 
            'display_name' => $request->display_name, 
            'description' => $request->description, 
        ]);

        return redirect()
            ->route('permissions.list');
    }

    public function edit($id)
    {

        $permissions = Permission::findOrFail($id);

        return view('backend.permission.update', compact('permissions'));
    }

    public function update(BackendPermissionRequest $request, $id)
    {

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => Str::slug($request->display_name), 
            'display_name' => $request->display_name, 
            'description' => $request->description, 
        ]);

        return redirect()
            ->route('permissions.list', compact('permission'));
    }

    public function destroy($id)
    {

        $group_permission = Permission::findOrFail($id);

        $group_permission->delete();

        return redirect()
            ->route('permissions.list');
    }
}

