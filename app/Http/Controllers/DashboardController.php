<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\carbon;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


    }
    public function get_dashboard()
    {
        $employees = Employee::with('department','vacations')->orderBy('id','ASC')->get();
        foreach($employees as $e)
        {
            if($e->vacations == NULL)
            {
               continue;
            }
            if($e->vacations->Evac > $e->vacations->Svac && Carbon::today()->toDateString() >= $e->vacations->Svac )
            {
                $e->status='اجازة';
                $e->save();
            }
           else if($e->vacations->Evac > $e->vacations->Svac && Carbon::today()->toDateString() != $e->vacations->Svac )
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





        $User=User::count();
        $department=Department::count();
        $employee=Employee::count();
        $invac=Employee::where('status','اجازة')->count();
        $outvac=Employee::where('status','في العمل')->count();
        return view('index',compact('User','department','employee','invac','outvac'));


    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('get.login');
}
}
