<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;
use Nette\Utils\Image;
class AdminController extends Controller
{
    //
   public function main()
   {
       return view('admin.index');
   }
//    For Adding Employee!
   public function addEmp(){
       return view('admin.addemployee');
   }
//    For viewing lists of employee
//    public function viewEmp(){
//        return view('admin.viewemployee');
//     }
    // function of saving the data into database
    public function savedata(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data=$request->all();
            // Calling the model
            $emp=new Employee();+
            // getting and saving all the data one by one
            $emp->name=$data['fname'];
            $emp->username=$data['uname'];
            $emp->phone=$data['fphone'];
            $emp->email=$data['femail'];
            // Check File if file does exist
            if ($request->hasFile('image')) {
                $img_tmp=$request->file('image');
                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(1111,999999).'.'.$extension;
                // defining the path to save image in it
                $img_path='uploads/employees/'.$filename;
                // Saving the image to folder
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $emp->image=$filename;
            }

            // saving into database
            $emp->save();
            // redirect to the same page 
            // return redirect()->back();
            // redirecting to the view page
            return redirect('/view-employee');
        }

    }
    // Function for fetching all the user data
    public function getAllData()
    {
        $employees=Employee::all();
        return view('admin.viewemployee',compact('employees'));
    }
    // Function for deleting all the user data
    public function deleteEmp($id=null){
        Employee::where(['id'=>$id])->delete();
        return redirect()->back();
    }
    // function for generating pdf
    public function allpdfdownload(){
        $demo=Employee::all();
        $pdf=PDF::loadView('admin.pdf',compact('demo'));
        // finally downloading pdf
        return $pdf->download("allemployee.pdf");
    }

}