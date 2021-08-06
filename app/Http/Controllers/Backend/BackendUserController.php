<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackendUserRequest;
use App\Models\User;
use App\Models\Role;
use Hash;
use DB;

class BackendUserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(4);

        return view('backend.user.index', compact('users'));
    }

    public function create()
    {

        $roles = Role::all();

        return view('backend.user.create', compact('roles'));
    }

    public function store(BackendUserRequest $request)
    {
        try
        {
            $img = '';
            if ($request->has('image'))
            {
                $image = $request->file('image');
                $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                    ->extension();
                $image->move(public_path() . '/files' . '/uploads' . '/images', 
                  $img);
            }

            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->birthday = $request->birthday;
            $users->avatar = $img;
            $users->password = Hash::make($request->password);
            $users->status = $request->status;

            if ($users->save())
            {
                \DB::table('role_user')
                    ->insert([
                      'role_id' => $request->role_id, 
                      'user_id' => $users->id
                    ]);

                \DB::commit();
            }

            return redirect()
                ->route('users.list')
                ->with('Success', 'Thêm thành công');

        }
        catch(\Exception $exception)
        {
            \DB::rollBack();

            return redirect()->back()
                ->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    public function edit($id)
    {
        $roles = Role::all();

        $users = User::with(['userRole' => function ($userRole)
        {
            $userRole->select('*');
        }
        ])->find($id);

        $listRoleUser = \DB::table('role_user')->where('user_id', $id)->first();

        return view('backend.user.update', compact('users', 'roles', 'listRoleUser'));

    }

    public function update(BackendUserRequest $request, $id)
    {

        try
        {
            $users = User::findOrFail($id);

            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = bcrypt($request->password);
            $users->phone = $request->phone;
            $users->birthday = $request->birthday;
            $users->status = $request->status;

            $img = '';
            if (!empty($request->has('image')))
            {
                $image = $request->file('image');
                $img = '/files' . '/uploads' . '/images/' . now()->format('H-i-s-m-s-d-m-Y') . '.' . $request->file('image')
                    ->extension();
                $image->move(public_path() . '/files' . '/uploads' . '/images', $img);

                $users->avatar = $img;
            }

            if ($users->save())
            {

                \DB::table('role_user')
                    ->where('user_id', $id)
                    ->delete();

                \DB::table('role_user')
                    ->insert([
                      'role_id' => $request->role_id, 
                      'user_id' => $users->id
                    ]);
            }

            \DB::commit();

            return redirect()
                ->route('users.list', compact('users'));
        }
        catch(\Exception $exception)
        {
            \DB::rollBack();
            return redirect()->back()
                ->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()
            ->route('users.list');
    }
}

