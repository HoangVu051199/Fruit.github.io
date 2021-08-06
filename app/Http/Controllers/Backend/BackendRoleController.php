<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackendRoleRequest;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class BackendRoleController extends Controller
{

    public function __construct(Permission $permission)
    {
        $this->permission =$permission;
    }
    

    public function index()
    {

        $roles = Role::with('permissionsRole')->orderBy('id', 'DESC')
            ->paginate(5);

        return view('backend.role.index', compact('roles'));
    }

    public function create()
    {

        $permissionsParent = Permission::select('*')->where('parent_id', 0)
            ->get();

        return view('backend.role.create', compact('permissionsParent'));
    }

    public function store(BackendRoleRequest $request)
    {

        $roles = new Role();

        $roles->name = Str::slug($request->display_name);
        $roles->display_name = $request->display_name;
        $roles->description = $request->description;

        if ($roles->save())
        {
            if (!empty($request->permissions))
            {
                foreach ($request->permissions as $key => $value)
                {
                    \DB::table('permission_role')
                    ->insert([
                        'permission_id' => $value, 
                        'role_id' => $roles->id
                    ]);
                }
            }
        }

        return redirect()
            ->route('roles.list');
    }

    public function edit($id)
    {

        $roles = Role::findOrFail($id);

        $permissionsParent = Permission::select('*')->where('parent_id', 0)
            ->get();

        $list_permission = \DB::table('permission_role')->where('role_id', $id)
            ->pluck('permission_id')
            ->toArray();

        if (!$roles)
        {
            return redirect()->route('role.index')
                ->with('danger', 'Quyền không tồn tại');
        }

        return view('backend.role.update', compact('roles', 'list_permission', 'permissionsParent'));
    }

    public function update(BackendRoleRequest $request, $id)
    {

        $roles = Role::findOrFail($id);

        $roles->name = Str::slug($request->display_name);
        $roles->display_name = $request->display_name;
        $roles->description = $request->description;

        if ($roles->save())
        {
            if (!empty($request->permissions))
            {
                \DB::table('permission_role')
                    ->where('role_id', $id)->delete();

                foreach ($request->permissions as $key => $value)
                {
                    \DB::table('permission_role')
                    ->insert([
                        'permission_id' => $value, 
                        'role_id' => $roles->id
                    ]);
                }
            }
        }

        return redirect()
            ->route('roles.list', compact('roles'));
    }

    public function destroy($id)
    {

        $roles = Role::findOrFail($id);

        $roles->delete();

        return redirect()
            ->route('roles.list');
    }
}

