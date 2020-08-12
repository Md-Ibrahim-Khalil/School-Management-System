<?php

namespace App\Http\Controllers;


use App\Student;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;




class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);              //Pagignate data
        return view('welcome', compact('students'));   // Compact is used for pass the data 'welcome' to 'students' table
    }
    //craete a new file create.blade.php
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $student = new Student;                        //Object, Added some model
        $student->first_name = $request->firstname;    //Data
        $student->last_name = $request->lastname;      //Data
        $student->email = $request->email;            //Data
        $student->phone = $request->phone;           //Data
        $student->save();
        return redirect(route('home'))->with('SuccessMsg', 'Student Successfuly Added');      //added home route with redirect
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));   //visible all data from student table so make a value=" " with database table name in edit.blade.php
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $student = Student::find($id);               //find assaign with $id
        $student->first_name = $request->firstname;  //Data
        $student->last_name = $request->lastname;    //Data
        $student->email = $request->email;           //Data
        $student->phone = $request->phone;         //Data
        $student->save();
        return redirect(route('home'))->with('SuccessMsg', 'Student Successfuly Updated');
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        return redirect(route('home'))->with('SuccessMsg', 'Student Delete Successfuly ');
    }
}