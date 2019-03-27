<?php

namespace App\Http\Controllers;

use App\Standard;
use App\Unit;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standards = Standard::latest()->paginate(10);
        return view('standards.index',compact('standards'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view('standards.create', compact('units'));
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
            'standard' => 'required',
            'standard_code' => 'required',
            'unit_id' => 'required',
        ]);

        Standard::create($request->all());


        return redirect()->route('standards.index')
            ->with('success','Standard created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        return view('standards.show',compact('standard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Standard $standard)
    {
        $units = Unit::all();
        return view('standards.edit',compact('standard','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standard $standard)
    {
        request()->validate([
            'standard' => 'required',
            'standard_code' => 'required',
            'unit_id' => 'required',
        ]);

        $standard->update($request->all());

        return redirect()->route('standards.index')
            ->with('success','Standard updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
