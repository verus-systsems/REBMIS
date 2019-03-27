<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Subject;
use App\Unit;
use App\Semester;
use App\Grade;
use DB;
use Session;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::latest()->paginate(10);
        return view('quizzes.index',compact('quizzes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $units = Unit::all();
        $semesters = Semester::all();
        $grades = Grade::all();
        return view('quizzes.create', compact('subjects', 'units', 'semesters','grades'));
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
            'quiz_name' => 'required',
            'quiz_hour' => 'required',
            'quiz_minutes' => 'required',
            'subject_id' => 'required',
            'unit_id' => 'required',
            'semester_id' => 'required',
        ]);

        $user_id = \Auth::id();

        DB::table('quizzes')->insertGetId([
            'quiz_name' => $request->quiz_name,
            'quiz_hour' => $request->quiz_hour,
            'quiz_minutes' => $request->quiz_minutes,
            'quiz_seconds' => 00,
            'subject_id' => $request->subject_id,
            'unit_id' => $request->unit_id,
            'semester_id' => $request->semester_id,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('quizzes.index')
            ->with('success','Quiz created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('quizzes.show',compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $subjects = Subject::all();
        $units = Unit::all();
        $semesters = Semester::all();
        $grades = Grade::all();
        return view('quizzes.edit', compact('quiz','subjects', 'units', 'semesters','grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        request()->validate([
            'quiz_name' => 'required',
            'quiz_hour' => 'required',
            'quiz_minutes' => 'required',
            'quiz_seconds' => 'required',
            'subject_id' => 'required',
            'unit_id' => 'required',
            'semester_id' => 'required',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizes.index')
            ->with('success','Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
