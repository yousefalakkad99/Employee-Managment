<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * * Display a listing of the resource.*
     * * @return \Illuminate\Http\Response
     *
     * */

   function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:الصلاحيات|اضافة صلاحية|تعديل صلاحية|حذف صلاحية',
         ['only' => ['index','store']]);

         $this->middleware('permission:اضافة صلاحية',
         ['only' => ['create','store']]);

         $this->middleware('permission:تعديل صلاحية',
         ['only' => ['edit','update']]);

         $this->middleware('permission:حذف صلاحية',
          ['only' => ['delete']]);



        }





        public function index(Request $request)
        {
            $roles = Role::orderBy('id','DESC')->paginate(5);
            return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }



        public function create()
        {
            $permission = Permission::get();
            return view('roles.create',compact('permission'));
        }



        public function store(Request $request)
        {
            $this->validate($request, ['name' => 'required|unique:roles,name','permission' => 'required',],
        [


                'name.required'=>'يرجى تسمية الصلاحية',
                'permission.required'=>'يرجى اختيار صلاحية',



        ]);
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')->with('success','تم انشاء صلاحية جديدة');
        }


        public function show($id)
        {
            $role = Role::find($id);
            if(!$role)
            {
                return redirect()->route('roles.index')->with('error','هنالك خطأ');

            }

            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)->get();
            return view('roles.show',compact('role','rolePermissions'));
        }



        public function edit($id)
        {
            $role = Role::find($id);
            if(!$role)
            {
                return redirect()->route('roles.index')->with('error','هنالك خطأ');

            }
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
            return view('roles.edit',compact('role','permission','rolePermissions'));

        }

public function update(Request $request, $id)
{
    $this->validate($request, ['name' => 'required','permission' => 'required',],
    [
        'name.required'=>'يرجى تسمية الصلاحية',
        'permission.required'=>'يرجى اختيار صلاحية',


    ]

);
    $role = Role::find($id);
    if(!$role)
    {
        return redirect()->route('roles.index')->with('error','هنالك خطأ');

    }
    $role->name = $request->input('name');
    $role->save();$role->syncPermissions($request->input('permission'));
    return redirect()->route('roles.index')->with('success','تم تحديث الصلاحيات بنجاح');
}

public function delete($id)
{
    $role = Role::find($id);
    if(!$role)
    {
        return redirect()->route('roles.index')->with('error','هنالك خطأ');

    }
    DB::table("roles")->where('id',$id)->delete();
    return redirect()->back()->with('success','تم الحذف بنجاح');
}


}
