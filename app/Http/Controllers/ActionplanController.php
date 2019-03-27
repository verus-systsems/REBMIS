<?php

namespace App\Http\Controllers;

use App\Actionplan;
use App\Grade;
use App\Subject;
use App\Unit;
use App\Student;
use App\Observationdocument;
use App\Planupdate;
use App\Semester;
use DB;
use Session;
use File;
use Illuminate\Http\Request;

class ActionplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = \Auth::id();
        $actionplans = Actionplan::where('user_id', $user_id)->paginate(10);

        return view('actionplans.index',compact('actionplans'))
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
        $subjects = Subject::all();
        $grades = Grade::all();
        $students = Student::all();
        $semesters = Semester::all();

        $user_id = \Auth::id();
        $actionplans = Actionplan::where('user_id', $user_id)->limit(3)->get();

        return view('actionplans.create',compact('semesters','units','subjects','grades','students','actionplans'));
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
            'grade_id' => 'required',
            'subject_id' => 'required',
            'unit_id' => 'required',
            'student_id' => 'required',
            'rating' => 'required',
            'observations' => 'required',
            'action_plan' => 'required',
            'plan_start_date' => 'required',
            'plan_end_date' => 'required',
        ]);

        $user_id = \Auth::id();

        $actionplan_id = DB::table('actionplans')->insertGetId([
            'grade_id' => $request->grade_id,
            'subject_id' => $request->subject_id,
            'unit_id' => $request->unit_id,
            'student_id' => $request->student_id,
            'rating' => $request->rating,
            'observations' => $request->observations,
            'observation_date' => date('Y-m-d'),
            'observation_month' => date('m'),
            'observation_year' => date('Y'),
            'action_plan' => $request->action_plan,
            'plan_start_date' => $request->plan_start_date,
            'plan_end_date' => $request->plan_end_date,
            'semester_id' => $request->semester_id,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name=$file->getClientOriginalName();

                $file->move(public_path().'/files/', $name);

                $filenames[] = [
                    'document_name' => $name,
                    'document_type' => $file->getClientOriginalExtension(),
                    'document_size' => '',
                    'actionplan_id' => $actionplan_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

            }

            Observationdocument::insert($filenames);
        }

        return redirect()->route('actionplans.index')
            ->with('success','Action plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actionplan  $actionplan
     * @return \Illuminate\Http\Response
     */
    public function show(Actionplan $actionplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actionplan  $actionplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Actionplan $actionplan)
    {

        $observations = Actionplan::where('student_id', $actionplan->student_id)->limit(5)->get();
        $planupdates = Planupdate::where('actionplan_id', $actionplan->id)->limit(10)->get();
        $i=0;

        $semesters = Semester::all();

        return view('actionplans.edit',compact('actionplan', 'semesters', 'observations','planupdates','i'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actionplan  $actionplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actionplan $actionplan)
    {
        request()->validate([
            'status' => 'required',
            'rating' => 'required',
        ]);

        DB::table('planupdates')->insertGetId([
            'status' => $request->status,
            'rating' => $request->rating,
            'status_date' => date('Y-m-d'),
            'status_month' => date('m'),
            'status_year' => date('Y'),
            'student_id' => $request->student_id,
            'actionplan_id' => $request->actionplan_id,
            'semester_id' => $request->semester_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('actionplans.edit',$request->actionplan_id)
            ->with('success','Update added successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actionplan  $actionplan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actionplan $actionplan)
    {
        //
    }

    public function getsubjects($id)
    {
        $subjects = Subject::where('grade_id',$id)->get();

        $select = '<select name="subject_id" id="subject_id" class="span3" onChange="unitFunction()" required="required">';

        $select .= '<option value="">Select Subject</option>';

        foreach ($subjects as $subject):

            $select .= '<option value="'.$subject->id.'">'.$subject->subject_title.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }

    public function getunits($id)
    {
        $units = Unit::where('subject_id',$id)->get();

        $select = '<select name="unit_id" id="unit_id" class="span3" required="required">';

        $select .= '<option value="">Select Unit</option>';

        foreach ($units as $unit):

            $select .= '<option value="'.$unit->id.'">'.$unit->unit_name.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }


}
