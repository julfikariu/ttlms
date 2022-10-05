<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();

        return view('pages.course.index', compact('courses'));
    }

    public function create(){
        return view('pages.course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'price' => 'required|string|max:255',

        ]);

        $course = Course::create([
            'name' => $request->name,
            'code' => $request->code,
            'pirce' => $request->pirce,
        ]);

        Session::flash('success', "Course created successfully.");

        return back();
    }


    public function addStudent($id){
        $students = User::where('role','student')->get();
        return view('pages.course.add-student',compact('students','id'));
    }

    public function addStudentSave(Request $request){
        $course = Course::findOrFail($request->get('course_id'));
        $course->students()->attach($request->student_id);

        Session::flash('success', "Add student successfully.");

        return back();
    }

    public function detail($id=null){
        $course = Course::findOrFail($id);
        return view('pages.course.details', compact('course'));
    }




}
