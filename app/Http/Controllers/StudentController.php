<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(){
            $students = Student::all();

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

        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'registration_no' => $request->registration_no,
        ]);

        Session::flash('success',"Student created successfully.");

        return back();


    }
}
