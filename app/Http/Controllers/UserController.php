<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Trait\ImageTrait;
use Illuminate\Support\Arr;
use Hash;
use DB;
class UserController extends Controller
{

    use ImageTrait;
    use HasRoles;
/**

* Display a listing of the resource.

*
* @return \Illuminate\Http\Response

*/
function __construct()
{
    $this->middleware('auth');

    $this->middleware('permission:استعلام المستخدمين',  ['only' => ['index']]);
     $this->middleware('permission:اضافة مستخدم',
     ['only' => ['create','store']]);
     $this->middleware('permission:تعديل حساب',
     ['only' => ['edit','update']]);
     $this->middleware('permission:حذف حساب',
      ['only' => ['destroy']]);




    }
public function index(Request $request)
{
    $user=User::select('id','username','email','image','roles_name')->get();
    return view('user.index',compact('user'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.

*
* @return \Illuminate\Http\Response
*/


public function create()
{
    $roles = Role::pluck('name','name')->all();
    return view('user.create',compact('roles'));

}
public function store(UserRequest $request)
{

    $input = $request->all();
    $input['image']=$this->save_image($request->image,'img/user/image');
    $input['password']=bcrypt($request->password);
    $user = User::create($input);
    $user->assignRole($request->input('roles_name'));
    return redirect()->route('user.index')->with('success','تمت اضافة مستخدم بنجاح');


}

/**

  * Display the specified resource.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */



/**
* Show the form for editing the specified resource.
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function edit($id)
{
    $user = User::find($id);
    if($user)
    {
    $roles_name = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    return view('user.edit',compact('user','roles_name','userRole'));
    }
    else
    return redirect()->route('users.index')->with('error','لا يوجد موظف لتعديله');

}
/**
 *  Update the specified resource in storage.
 *
 *  @param  \Illuminate\Http\Request  $request
 *  @return \Illuminate\Http\Response
 *
*/
public function update(UserUpdateRequest $request, $id)
{


    $input = $request->all();
    if($request->hasfile('image'))
    {
        $input['image']=$this->save_image($request->image,'img/user/image');
    }
    if(!empty($input['password']))
    {
        $input['password'] = Hash::make($input['password']);
    }
    else
    {
        $input = Arr::except($input,array('password'));

    }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('user.index',$id)->with('success','تم تعديل بيانات الموظف');
    }

    /**
     *
     * * @param  int  $id
     * * @return \Illuminate\Http\Response

     */

    public function delete($id)
    {

       $user= User::find($id);
        if(!$user)
        {
            return redirect()->route('user.index')->with('error','لا يوجد موظف لحذفه');
        }
        $user->delete();
        return redirect()->route('user.index')->with('success','تم حذف الموظف بنجاح');
    }

}
