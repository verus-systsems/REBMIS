<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Grade;
use App\Studyfield;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::latest()->paginate(10);
        return view('subjects.index',compact('subjects'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $studyfields = Studyfield::all();
        return view('subjects.create', compact('grades', 'studyfields'));
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
            'subject_title' => 'required',
            'description' => 'required',
            'grade_id' => 'required',
            'studyfield_id' => 'required',
        ]);

        Subject::create($request->all());


        return redirect()->route('subjects.index')
            ->with('success','Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subjects.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $grades = Grade::all();
        $studyfields = Studyfield::all();
        return view('subjects.edit',compact('subject','grades', 'studyfields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        request()->validate([
            'subject_title' => 'required',
            'description' => 'required',
            'grade_id' => 'required',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')
            ->with('success','Subject updated successfully');
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
