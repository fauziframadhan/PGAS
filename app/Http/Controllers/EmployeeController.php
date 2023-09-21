<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Employee::where('name','LIKE','%' .$request->search.'%')->get();
            Session::put('page_url',request()->fullUrl());
        }else{
            $data = Employee::all();
            Session::put('page_url',request()->fullUrl());
        }
        // dd($data);
        return view ('employeedata',compact('data'));
    }

    public function addemployee(){
        $datadepartment = Department::all();
        return view('addemployee',compact('datadepartment'));
    }

    public function insertemployee(Request $request){
        Employee::create($request->all());
        return redirect()->route('employee')->with('Success','Data Added Successfully');
    }

    public function showemployee($employeeid){
        $data = Employee::find($employeeid);
        return view('showemployee', compact('data'));

    }

    public function updateemployee(Request $request, $employeeid){
        $data = Employee::find($employeeid);
        $data->update($request->all());
        if(session('page_url')){
            return Redirect(session('page_url'))->with('Success','Data Updated Successfully');
        }
        return redirect()->route('employee')->with('Success','Data Updated Successfully');
    }

    public function deleteemployee($employeeid){
        // $data = Employee::find($employeeid);
        // $data->deleteemployee();
        DB::table('employees')->where('employeeid',$employeeid)->delete();
        return redirect()->route('employee')->with('Success','Data Deleted Successfully');
    }
}