<?php

namespace App\Http\Controllers;

use App\Student;
use App\School;
use App\Grade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        $grades = Grade::all();
        return view('students.create', compact('schools','grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'student_name' => 'required',
            'unique_identifier' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'grade_id' => 'required',
            'school_id' => 'required',
        ]);

        $user_id = \Auth::id();


        $input = $request->all();
        $input['user_id'] = $user_id;


        Student::create($input);

        return redirect()->route('students.index')
            ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $schools = School::all();
        $grades = Grade::all();
        return view('students.edit',compact('student','schools','grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        request()->validate([
            'student_name' => 'required',
            'unique_identifier' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'grade_id' => 'required',
            'school_id' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success','Student updated successfully');
    }
}
