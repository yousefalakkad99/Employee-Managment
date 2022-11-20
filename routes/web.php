<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'guest:web','namespace'=>'App\Http\Controllers'],function(){
    Route::get('login','LoginController@getlogin')->name('get.login');
    Route::post('login','LoginController@login')->name('login');
});

Route::group(['middleware'=>'auth:web','namespace'=>'App\Http\Controllers'],function(){
/************************************************************************************ */
/*                      BEGIN DASHBOARD ROUTE                                       */
/********************************************************************************** */
    Route::get('/','DashboardController@get_dashboard')->name('dashboard');
    Route::post('logout','DashboardController@logout')->name('logout');
/************************************************************************************ */
/*                      END DASHBOARD ROUTE                                       */
/********************************************************************************** */
/************************************************************************************ */
/*                      BEGIN DEPARTMENT ROUTE                                       */
/********************************************************************************** */
Route::group(['prefix'=>'department'],function(){
    Route::get('/','DepartmentController@get_all_department')->name('departmint');
    Route::get('create','DepartmentController@create')->name('department.create');
    Route::post('store','DepartmentController@store')->name('department.store');
    Route::get('edit/{department_id}','DepartmentController@edit')->name('edit.departmint');
    Route::post('update/{department_id}','DepartmentController@update')->name('update.department');
    Route::get('delete/{department_id}','DepartmentController@delete')->name('delete.department');});
/************************************************************************************ */
/*                      END DEPARTMENT ROUTE                                         */
/********************************************************************************** */


/************************************************************************************ */
/*                      BEGIN ROLES ROUTE                                         */
/********************************************************************************** */
Route::group(['prefix'=>'roles'],function(){
    Route::get('/index','RoleController@index')->name('roles.index');
    Route::get('create','RoleController@create')->name('roles.create');
    Route::get('show/{roles_id}','RoleController@show')->name('roles.show');
    Route::post('store','RoleController@store')->name('roles.store');
    Route::get('edit/{roles_id}','RoleController@edit')->name('roles.edit');
    Route::post('update/{roles_id}','RoleController@update')->name('roles.update');
    Route::get('delete/{roles_id}','RoleController@delete')->name('roles.delete');});
    /************************************************************************************ */
/*                      END ROLES ROUTE                                                  */
/********************************************************************************** *****/


/************************************************************************************ */
/*                      BEGIN EMPLOYEE ROUTE                                         */
/********************************************************************************** */

Route::group(['prefix'=>'employee'],function(){
    Route::get('/index','EmployeeController@index')->name('employee.index');
    Route::get('create','EmployeeController@create')->name('employee.create');
    Route::get('show/{employee_id}','EmployeeController@show')->name('employee.show');
    Route::post('store','EmployeeController@store')->name('employee.store');
    Route::get('edit/{employee_id}','EmployeeController@edit')->name('employee.edit');
    Route::post('update/{employee_id}','EmployeeController@update')->name('employee.update');
    Route::get('delete/{employee_id}','EmployeeController@delete')->name('employee.delete');});
    Route::get('img.cirt.show/{id}','EmployeeController@certImages')->name('img.cirt.show');
    Route::get('print/{id}','EmployeeController@print')->name('print');
    Route::post('attachmint/{id}','EmployeeController@attachmint_add')->name('attachmint.add');
    Route::get('attachmint/del/{id}','EmployeeController@attachmint_del')->name('attachmint.del');
    Route::get('download/{file}','EmployeeController@download_file')->name('download.file');
    Route::get('show/{id}','EmployeeController@show_file')->name('show.file');
    Route::post('addVac/{employee_id}','EmployeeController@vacations')->name('vacations');

/************************************************************************************ */
/*                      END EMPLOYEE ROUTE                                         */
/********************************************************************************** */

/************************************************************************************ */
/*                      END user ROUTE                                         */
/********************************************************************************** */
Route::group(['prefix'=>'user'],function(){
    Route::get('/index','UserController@index')->name('user.index');
    Route::get('create','UserController@create')->name('user.create');
    Route::get('show/{user_id}','UserController@show')->name('user.show');
    Route::post('store','UserController@store')->name('user.store');
    Route::get('edit/{user_id}','UserController@edit')->name('user.edit');
    Route::post('update/{user_id}','UserController@update')->name('user.update');
    Route::get('delete/{user_id}','UserController@delete')->name('user.delete');});
    /************************************************************************************ */
/*                      END user ROUTE                                         */
/********************************************************************************** */



//Route::resource('users','UserController');
//Route::post('update/{id}','UserController@update')->name('user.update');
//Route::get('destroy/{id}','UserController@destroy')->name('user.destroy');
});



    /*Route::resource('users','UserController');
    Route::post('update/{id}','UserController@update')->name('users.update');
    Route::get('destroy/{id}','UserController@destroy')->name('users.destroy');
    Route::get('img.cirt.show/{id}','UserController@certImages')->name('img.cirt.show');
    Route::get('print/{id}','UserController@print')->name('print');*/

