<?php

use App\Models\Employee;
use App\Models\Spending;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\DepartmentController;
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

Route::get('/', function () {
    $jdata = Employee::count();
    $jdata1 = Department::count();
    $jdata2 = Spending::count();

    return view('welcome', compact('jdata','jdata1','jdata2'));
});

Route::group(['middleware' => ['auth','accessrights:admin']], function(){
    Route::post('/updateemployee/{employeeid}', [EmployeeController::class,'updateemployee'])->name('updateemployee');
    Route::get('/deleteemployee/{employeeid}', [EmployeeController::class,'deleteemployee'])->name('deleteemployee');
    Route::get('/showemployee/{employeeid}', [EmployeeController::class,'showemployee'])->name('showemployee');
    
    Route::post('/updatedepartment/{departmentid}', [DepartmentController::class,'updatedepartment'])->name('updatedepartment');
    Route::get('/deletedepartment/{departmentid}', [DepartmentController::class,'deletedepartment'])->name('deletedepartment');
    Route::get('/showdepartment/{departmentid}', [DepartmentController::class,'showdepartment'])->name('showdepartment');

    Route::post('/updatespending/{employeeid}', [SpendingController::class,'updatespending'])->name('updatespending');
    Route::get('/deletespending/{employeeid}', [SpendingController::class,'deletespending'])->name('deletespending');
    Route::get('/showspending/{employeeid}', [SpendingController::class,'showspending'])->name('showspending');
});

// Route::middleware(['admin'])->group(function () {
//     Route::delete('/employee/{employeeid}', 'EmployeeController@destroy');
//     Route::put('/employee/{employeeid}', 'EmployeeController@update');
    
//     Route::delete('/department/{departmentid}', 'DepartmentController@destroy');
//     Route::put('/department/{departmentid}', 'DepartmentController@update');
    
//     Route::delete('/spending/{spendingid}', 'SpendingController@destroy');
//     Route::put('/spending/{spendingid}', 'SpendingController@update');
// });


Route::get('/employee', [EmployeeController::class,'index'])->name('employee')->middleware('auth');
Route::get('/addemployee', [EmployeeController::class,'addemployee'])->name('addemployee');
Route::post('/insertemployee', [EmployeeController::class,'insertemployee'])->name('insertemployee');



Route::get('/department', [DepartmentController::class,'index'])->name('department')->middleware('auth');
Route::get('/adddepartment', [DepartmentController::class,'adddepartment'])->name('adddepartment');
Route::post('/insertdepartment', [DepartmentController::class,'insertdepartment'])->name('insertdepartment');



Route::get('/spending', [SpendingController::class,'index'])->name('spending')->middleware('auth');
Route::get('/addspending', [SpendingController::class,'addspending'])->name('addspending');
Route::post('/insertspending', [SpendingController::class,'insertspending'])->name('insertspending');

Route::get('dateasc', 'SpendingController@dateasc');

//Export PDF Spending
Route::get('/exportpdf/', [SpendingController::class,'exportpdf'])->name('exportpdf');


Route::get('/login/', [LoginController::class,'login'])->name('login');
Route::post('/loginprocess/', [LoginController::class,'loginprocess'])->name('loginprocess');


Route::get('/register/', [LoginController::class,'register'])->name('register');
Route::post('/registeruser/', [LoginController::class,'registeruser'])->name('registeruser');

Route::get('/logout/', [LoginController::class,'logout'])->name('logout');