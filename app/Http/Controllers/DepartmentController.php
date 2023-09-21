<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data1 = Department::where('name','LIKE','%' .$request->search.'%')->get();
            Session::put('page_url',request()->fullUrl());
        }else{
            $data1 = Department::all();
            Session::put('page_url',request()->fullUrl());
        }
        
        // dd($data);
        return view ('departmentdata',compact('data1'));
    }
    
    public function adddepartment(){
        return view('adddepartment');
    }

    public function insertdepartment(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4|max:40',
        ]);

        Department::create($request->all());
        return redirect()->route('department')->with('Success','Data Added Successfully');   
    
    }

    public function showdepartment($departmentid){
        $data1 = Department::find($departmentid);
        return view('showdepartment', compact('data1'));

    }

    public function updatedepartment(Request $request, $departmentid){
        $data1 = Department::find($departmentid);
        $data1->update($request->all());
        if(session('page_url')){
            return Redirect(session('page_url'))->with('Success','Data Updated Successfully');
        }

        return redirect()->route('department')->with('Success','Data Updated Successfully');
    }

    public function deletedepartment($departmentid){
        // $data1 = Department::find($departmentid);
        // $data1 ->delete();
        DB::table('departments')->where('departmentid',$departmentid)->delete();
        return redirect()->route('department')->with('Success','Data Deleted Successfully');


    }

}