<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('pages.course.create');
    }
}
