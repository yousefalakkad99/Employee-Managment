<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');


        $this->middleware('permission:استعلام قسم', ['only' => ['get_all_department']]);

         $this->middleware('permission:اضافة قسم', ['only' => ['store']]);

         $this->middleware('permission:تعديل قسم', ['only' => ['edit','update']]);

         $this->middleware('permission:حذف قسم',  ['only' => ['delete']]);





    }
    public function get_all_department(Request $request)
{

    $Departments=Department::select('id','department_name','department_code')->get();

    return view ('department.index',compact('Departments'))->with('i', ($request->input('page', 1) - 1) * 5);

}
public function create()
    {
        return view ('department.create');

    }

    public function store(Request $request)
    {
        Validator::make($request, [
            'department_code'=>['required|max:100|unique:department,department_code,'],
            'department_name'=>['required|max:100|unique:department,department_name,',
        ],
        ]);

       //INSERT DATA
       Department::create([
        'department_name'=>$request->department_name,
        'department_code'=>$request->department_code,
       ]);
       return redirect()->route('departmint')->with(['success'=>'تمت اضافة القسم بنجاح']);

    }



    public function edit($department_id)
    {
      $department=Department::find($department_id);
      if(!$department)
      return redirect()->route('departmint')->with(['error'=>'هذا القسم غير موجود']);


    $Departments=Department::select('id','department_name','department_code')->find($department_id);
    return view('department.edit',compact('Departments'));

    }

    public function update(DepartmentRequest $request,$department_id)
    {

      $department=Department::find($department_id);
      if(!$department)
      return redirect()->back();

      $department->update([
        'department_name'=>$request->department_name,
        'department_code'=>$request->department_code,


      ]);
      return redirect('department')->with(['success'=>'تمت تحديث القسم بنجاح']);

    }


    public function delete($department_id)
    {
        $department=Department::find($department_id);
        if(!$department)
        return redirect()->route('departmint')->with(['error'=>'هذا القسم غير موجود']);
        $department->users()->delete();
        $department->delete();
        return redirect()->route('departmint')->with(['success'=>'تمت حذف القسم بنجاح']);

    }
}
