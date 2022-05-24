<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParkingRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Module;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {
        $data['rows'] = Role::all();
        $data['setting'] = Setting::first();
        return view('role.index',compact('data'));
    }


    public function create()
    {
        $data['setting'] = Setting::first();
        return view('role.create',compact('data'));
    }

    public function store(RoleRequest $request)
    {
        $user_id = Auth::id();
        $request->request->add(['created_by'=>$user_id]);
        $row = Role::create($request->all());
        if ($row){
            $request->session()->flash('success', 'Role created successfully');
        } else{
            $request->session()->flash('error', 'Role creation failed');
        }
        return redirect()->route('role.index');
    }

    public function show($id)
    {
        $data['setting'] = Setting::first();

        $data['row'] = Role::find($id);
        $created_user = $data['row']->created_by;
        if (isset($created_user)) {
            $data['create'] = User::find($created_user);
        } else{
            $data['create'] = User::find(1);
        }
        $updated_user = $data['row']->updated_by;
        if (isset($updated_user)) {
            $data['update'] = User::find($updated_user);
        } else{
            $data['update'] = '';
        }
        if (!$data['row']){
            request()->session()->flash('error', 'Invalid request');
            return redirect()->route('role.index');
        }
        return view('role.show',compact('data'));
    }

    public function edit($id)
    {
        $data['setting'] = Setting::first();

        $data['row'] = Role::find($id);
        if (!$data['row']){
            request()->session()->flash('error', 'Invalid request');
            return redirect()->route('role.index');
        }
        return view('role.edit',compact('data'));
    }

    public function update(RoleRequest $request, $id)
    {
        $user_id = Auth::id();
        $request->request->add(['updated_by'=>$user_id]);
        $data['row'] = Role::find($id);
        if (!$data['row']){
            request()->session()->flash('error', 'Invalid request');
            return redirect()->route('role.index');
        }
        if ($data['row']->update($request->all())){
            $request->session()->flash('success', 'Role updated successfully');
        } else{
            $request->session()->flash('error', 'Role update failed');
        }
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $data['row'] = Role::find($id);
        if ($data['row']){
            if ($data['row']->delete()){
                request()->session()->flash('success', 'Role deleted successfully');
            } else{
                request()->session()->flash('error', 'Role delete failed');
            }
        } else{
            request()->session()->flash('error', 'Invalid request');
        }
        return redirect()->route('role.index');
    }

    public function trash(){
        $data['setting'] = Setting::first();
        $data['rows'] = Role::onlyTrashed()->orderby('deleted_at','desc')->get();
        return view('role.trash',compact('data'));
    }

    public function restore($id){
        $data['row'] = Role::where('id',$id)->withTrashed()->first();

        if ($data['row']->restore()){
            request()->session()->flash('success', 'Role restored successfully');
        } else{
            request()->session()->flash('error', 'Role restore failed');
        }
        return redirect()->route('role.index');
    }
}
