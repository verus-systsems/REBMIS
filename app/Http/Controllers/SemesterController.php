<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::latest()->paginate(10);
        return view('semesters.index',compact('semesters'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-1; $year <= $current_year; $year++) $years[$year] = $year;

        return view('semesters.create', compact('years'));
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
            'semester' => 'required',
            'semester_year' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        Semester::create($request->all());


        return redirect()->route('semesters.index')
            ->with('success','Trimester created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        return view('semesters.show',compact('semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-1; $year <= $current_year; $year++) $years[$year] = $year;
        return view('semesters.edit',compact('semester', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        request()->validate([
            'semester' => 'required',
            'semester_year' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $semester->update($request->all());

        return redirect()->route('semesters.index')
            ->with('success','Trimester updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
    }
}
