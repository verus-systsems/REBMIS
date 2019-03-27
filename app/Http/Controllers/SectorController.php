<?php

namespace App\Http\Controllers;

use App\School;
use App\Sector;
use App\District;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::latest()->paginate(10);
        return view('sectors.index',compact('sectors'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('sectors.create', compact('districts'));
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
            'sector_name' => 'required',
            'district_id' => 'required',
        ]);


        Sector::create($request->all());


        return redirect()->route('sectors.index')
            ->with('success','Sector created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        return view('sectors.show',compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        $districts = District::all();
        return view('sectors.edit',compact('sector','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        request()->validate([
            'sector_name' => 'required',
            'district_id' => 'required',
        ]);

        $sector->update($request->all());

        return redirect()->route('sectors.index')
            ->with('success','Sector updated successfully');
    }

    public function getsectors($id)
    {

        $sectors = Sector::where('district_id',$id)->get();

        $select = '<select name="sector_id" id="sector_id" class="span3" onChange="schoolFunction()" required="required">';

        $select .= '<option value="">Select Sector</option>';

        foreach ($sectors as $sector):

            $select .= '<option value="'.$sector->id.'">'.$sector->sector_name.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }

    public function getschools($id)
    {

        $schools = School::where('sector_id',$id)->get();

        $select = '<select name="school_id" id="school_id" class="span3" required="required">';

        $select .= '<option value="">Select School</option>';

        foreach ($schools as $school):

            $select .= '<option value="'.$school->id.'">'.$school->school_name.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }


    public function districtsectors($id)
    {

        $sectors = Sector::where('district_id',$id)->get();

        $select = '<select name="sectorID" id="sectorID" class="span3" onChange="sectorschoolFunction()" required="required">';

        $select .= '<option value="">Select Sector</option>';

        foreach ($sectors as $sector):

            $select .= '<option value="'.$sector->id.'">'.$sector->sector_name.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }

    public function sectorschools($id)
    {

        $schools = School::where('sector_id',$id)->get();

        $select = '<select name="schoolID" id="schoolID" class="span3" required="required">';

        $select .= '<option value="">Select School</option>';

        foreach ($schools as $school):

            $select .= '<option value="'.$school->id.'">'.$school->school_name.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
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
