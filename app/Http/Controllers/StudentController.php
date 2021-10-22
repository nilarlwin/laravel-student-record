<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students=Student::all();
        return view('index',['students'=>$students]);
    }
   public function create(){
       return view('create');
   }
   public function store(Request $request){
       $request->validate([
        'name'=>'required',
        'email'=>'required',
        'class'=>'required',
        'phone'=>'required',
        'address'=>'required'
       ]);
       Student::create([
           'name'=>$request->input('name'),
           'email'=>$request->input('email'),
           'class'=>$request->input('class'),
           'phone'=>$request->input('phone'),
           'address'=>$request->input('address'),
       ]);
       return redirect('students')->with('status','New Record Created Successfully');   
   }
   public function update($id){
       $students=Student::find($id);
       return view('update',['students'=>$students]);
   }
   public function edit(Request $request,$id){
       $request->validate([
        'name'=>'required',
        'email'=>'required',
        'class'=>'required',
        'phone'=>'required',
        'address'=>'required'
       ]);
       Student::find($id)->update([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'class'=>$request->input('class'),
        'phone'=>$request->input('phone'),
        'address'=>$request->input('address'),
       ]);
       return redirect('students')->with('status','Record Updated Successfully');
   }
   public function delete($id){
     Student::destroy($id);
     return redirect()->back()->with('status','Record Deleted Successfully');
   }
   
}
