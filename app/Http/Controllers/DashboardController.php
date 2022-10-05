<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $total_student = User::where('role','student')->count();
        $total_course = Course::count();
        return view('dashboard',compact('total_student','total_course'));
    }
}
