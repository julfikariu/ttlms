<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(){
            $students = User::where('role','student')->get();

            return view('pages.student.index', compact('students'));
    }

    public function create(){
        return view('pages.student.create');
    }

    public function store(Request $request){

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'registration_no' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',

        ]);

        $student = User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'regi_no' => $request->registration_no,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'student',
        ]);

        Session::flash('success',"Student created successfully.");

        return back();


    }


    public function detail($id=null){
        $student = User::findOrFail($id);
        return view('pages.student.details', compact('student'));
    }
}
