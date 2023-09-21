<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employee;
use App\Models\Spending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SpendingController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data2 = Spending::where('employeeid','LIKE','%' .$request->search.'%')->get();
            Session::put('page_url',request()->fullUrl());
        }else{
            $data2 = Spending::all();
            Session::put('page_url',request()->fullUrl());
        }
        // dd($data);
        return view ('spendingdata',compact('data2'));
    }

    public function addspending(){
        $dataemployee = Employee::all();
        return view('addspending',compact('dataemployee'));
    }

    public function insertspending(Request $request){
        Spending::create($request->all());
        return redirect()->route('spending')->with('Success','Data Added Successfully');
    }

    public function showspending($employeeid){
        $data2 = Spending::find($employeeid);
        return view('showspending', compact('data2'));

    }

    public function updatespending(Request $request, $employeeid){
        $data2 = Spending::find($employeeid);
        $data2->update($request->all());
        if(session('page_url')){
            return Redirect(session('page_url'))->with('Success','Data Updated Successfully');
        }
        return redirect()->route('spending')->with('Success','Data Updated Successfully');
    }

    public function deletespending($employeeid){
        // $data2 = Spending::find($employeeid);
        // $data2->delete();
        DB::table('spendings')->where('employeeid',$employeeid)->delete();
        return redirect()->route('spending')->with('Success','Data Deleted Successfully');
    }

    public function exportpdf(){
        $data2 = Spending::all();

        view()->share('data2', $data2);
        $pdf = PDF::loadview('spendingdata-pdf');
        return $pdf->download('SpendingData.pdf');
    }

    public function dateasc()
{
    $data2 = DB::table('spendings')
        ->orderBy('date', 'asc') // Urutkan dari yang terlama hingga terbaru
        ->get();

    return view('spending', compact('data2'));
}
}