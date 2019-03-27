<?php

namespace App\Http\Controllers;

use App\Studyfield;
use Illuminate\Http\Request;

class StudyfieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studyfields = Studyfield::latest()->paginate(10);
        return view('studyfields.index',compact('studyfields'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('studyfields.create');
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
            'study_field' => 'required',
        ]);


        Studyfield::create($request->all());


        return redirect()->route('studyfields.index')
            ->with('success','Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Studyfield $studyfield)
    {
        return view('studyfields.show',compact('studyfield'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Studyfield $studyfield)
    {
        return view('studyfields.edit',compact('studyfield'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studyfield $studyfield)
    {
        request()->validate([
            'study_field' => 'required',
        ]);

        $studyfield->update($request->all());

        return redirect()->route('studyfields.index')
            ->with('success','Subject updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Studyfield  $studyfield
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studyfield $studyfield)
    {
        //
    }
}
