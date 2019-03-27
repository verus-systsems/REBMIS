<?php

namespace App\Http\Controllers;
use App\Unit;
use App\Subject;
use App\Grade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        return view('home',compact('units','subjects','grades'));
    }
}
