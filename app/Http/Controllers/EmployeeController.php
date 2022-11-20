<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Department;
use App\Trait\ImageTrait;
use Illuminate\Support\Arr;
use Hash;
use App\Models\attachments;
use App\Models\Vacation;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;


class EmployeeController extends Controller
{
    use ImageTrait;
    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:الموظفين',  ['only' => ['index']]);

         $this->middleware('permission:اضافة موظف',
         ['only' => ['create','store']]);
         $this->middleware('permission:تعديل موظف',
         ['only' => ['edit','update']]);
         $this->middleware('permission:حذف موظف',
          ['only' => ['destroy']]);
          $this->middleware('permission:استعلام الموظفين',
          ['only' => ['show']]);



        }
    public function index(Request $request)
    {


        $search_text = $request->input('query');
        if($search_text != "")
        {
        $employee = Employee::with('department','vacations')->whereHas('department', function ($q) use($search_text){
            $q->where('department_code', 'like', "%$search_text%");
        })->orwhere('full_name', 'like', "%$search_text%")->orderBy('id','ASC')->paginate(5);

            return view('employee.index',compact('employee'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
        else
        {
            $employee = Employee::orderBy('id','ASC')->paginate(5);
            foreach($employee as $e)
            {
                if($e->vacations == NULL)
                {
                   continue;
                }
                if($e->vacations->Evac > $e->vacations->Svac && Carbon::today()->toDateString() >= $e->vacations->Svac  )
                {
                    $e->status='اجازة';
                    $e->save();
                }
               else if($e->vacations->Evac > $e->vacations->Svac)
                {
                    $e->status='في العمل';
                    $e->save();
                }
                else
                {
                    $vacations=Vacation::find($e->vacations->id);
                    $vacations->delete();
                    $e->status='في العمل';
                    $e->save();
                }

        }


        }

        return view('employee.index',compact('employee'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
    * Show the form for creating a new resource.

    *
    * @return \Illuminate\Http\Response
    */


    public function create()
    {

        $dept=Department::select('id','department_code')->get();
        return view('employee.create',compact('dept'));

    }
    public function store(EmployeeRequest $request)
    {
        $input = $request->all();
        $input['image']=$this->save_image($request->image,'img/employee/image');
        $employee = Employee::create($input);
        return redirect()->route('employee.index')->with('success','تمت اضافة مستخدم بنجاح');
    }

    /**

      * Display the specified resource.
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

      public function show($id,Request $request)
      {

        $employee=Employee::find($id);
        $attachmint=attachments::with('employess')->where('employee_id',$id)->get();
        if($employee)
        {
            return view('employee.show',compact('employee','attachmint'))->with('i', ($request->input('page', 1) - 1) * 5);

        }
        else{
            return redirect()->route('employee.index')->with('error','لا يوجد موظف لعرضه');

        }


    }

    /**
    * Show the form for editing the specified resource.
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
        $dept=Department::select('id','department_code')->get();
        return view('employee.edit',compact('employee','dept'));
        }
        else
        return redirect()->route('employee.index')->with('error','لا يوجد موظف لتعديله');

    }
    /**
     *  Update the specified resource in storage.
     *
     *  @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     *
    */
    public function update(EmployeeUpdateRequest $request, $id)
    {

        $input = $request->all();


        if($request->hasfile('image'))
        {
            $input['image']=$this->save_image($request->image,'img/employee/image');
        }


            $employee = Employee::find($id);
            $employee->update($input);
            return redirect()->route('employee.show',$id)->with('success','تم تعديل بيانات الموظف');
        }

        /**
         *
         * * @param  int  $id
         * * @return \Illuminate\Http\Response

         */

        public function delete($id)
        {

           $employee= Employee::find($id);
            if(!$employee)
            {
                return redirect()->route('employee.index')->with('error','لا يوجد موظف لحذفه');

            }
            $employee->delete();
            return redirect()->route('employee.index')->with('success','تم حذف الموظف بنجاح');
        }

    public function certImages($id)
    {

        $employee = Employee::find($id);
        $images=$employee->Certificates_photo;
        if(!$images)
        {
            return redirect()->back()->with('Empty','لا يوجد صور');

        }
        return view('employee.img_certafic',compact('employee','images'));

    }

    public function Print($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('employee.Print',compact('employee'));
    }

    public function attachmint_add(Request $request,$id)
    {

        $validator= Validator::make($request->all(),[
            'attachmints'=>'required'], ['attachmints.required'=>'يرجى اضافة مرفق']);
            if($request->hasFile('attachmints'))
            {
                $attachmit =new attachments;
            $attachmit->file=$this->save_image($request->file('attachmints'),'img/employee/attachmints');
            $attachmit->type=$request->attachmints->getClientOriginalExtension();
            $attachmit->originated_by=Auth::user()->username;
            $attachmit->employee_id=$id;
            $attachmit->save();
            return redirect()->back()->with('AT_success','تمت الاضافة بنجاح');
            }
            return redirect()->back()->with('AT_error','حاول مرة اخرى');


    }

    public function attachmint_del($id)
    {
        $attachments= attachments::find($id);
            if(!$attachments)
            {
                return redirect()->back()->with('AT_error','حاول مرة اخرى');

            }
            $attachments->delete();
            return redirect()->back()->with('AT_success','تمت الحذف بنجاح');
    }

    public function download_file(Request $request,$file)
    {
        return response()->download(public_path('img/employee/attachmints/'.$file));
    }

    public function show_file($id)
    {

        $attachments= attachments::find($id);
        return view('employee.img_certafic',compact('attachments'));

    }

    public function vacations(Request $request,$employee_id)
    {
        if($request->Svac > $request->Evac)
        {
            return redirect()->back()->with('error','لا يمكن ان يكون تاريخ بداية الاجازة اكبر من تاريخ نهاية الاجازة');
        }
        if(Carbon::today()->toDateString() > $request->Evac)
        {
            return redirect()->back()->with('error','لا يمكن اختيار يوم فائت');
        }
        if(Carbon::today()->toDateString() > $request->Svac)
        {
            return redirect()->back()->with('error','يرجى اختيار تاريخ من اليوم وما بعد');
        }
        $validator= Validator::make($request->all(),[
            'Svac'=>'required','Evac'=>'required'], ['vacations.required'=>'يرجى تحديد تاريخ']);
            if($validator->fails())
            {
                return redirect()->back()->with('error','يرجى تحديد تاريخ');
            }
            else
            {

                $vacations =new Vacation;
                $vacations->Svac=$request->Svac;
                $vacations->Evac=$request->Evac;
                $vacations->employee_id=$employee_id;
                $vacations->save();
                return redirect()->back()->with('success','تم منح الاجازة بنجاح');



            }

    }


    }
