<?php

namespace App\Http\Controllers;
use App\Questiondatabank;
use App\Unit;
use App\Subject;
use App\Grade;
use DB;
use Session;
use File;
use PDF;
use Html;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('resources.index',compact('units', 'subjects', 'grades'));
    }

    public function searchresources(Request $request)
    {
        $q = Questiondatabank::query();

        if ($request->has('grade_id'))
        {
           //$q->where('name','like',Input::get('search'));
            $q->where('grade_id', $request->grade_id);
        }

        if ($request->has('subject_id'))
        {
            $q->where('subject_id', $request->subject_id);
        }

        if ($request->has('unit_id'))
        {
            $q->where('unit_id', $request->unit_id);
        }

        $records = $q->orderBy('id')->get();

        $results = $q->orderBy('id')->paginate(2);


        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        $total = count($records);

        $theunit = Unit::find($request->unit_id);
        $thesubject = Subject::find($request->subject_id);
        $thegrade = Grade::find($request->grade_id);


        //return view('resources.results',compact('units', 'subjects', 'grades','results','total', 'theunit','thesubject','thegrade'));

        return view('resources.results',compact('units', 'subjects', 'grades','results','total', 'theunit','thesubject','thegrade'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function view(Request $request)
    {

        $question = Questiondatabank::find($request->question_id);

        $hits = ($question->hits+1);

        DB::table('questiondatabanks')
            ->where('id', $request->question_id)
            ->update(['hits' => $hits]);


        $theunit = Unit::find($request->unit_id);
        $thesubject = Subject::find($request->subject_id);
        $thegrade = Grade::find($request->grade_id);

        return view('resources.view',compact('thegrade', 'thesubject', 'theunit','question'));
    }

    public function downloadquestion($id)
    {

        $question = Questiondatabank::find($id);

        $downloads = ($question->downloads+1);

        DB::table('questiondatabanks')
            ->where('id', $id)
            ->update(['downloads' => $downloads]);


        $unit = Unit::find($question->unit_id);
        $subject = Subject::find($question->subject_id);
        $grade = Grade::find($question->grade_id);

        $table = '<table width="100%">';
        $table .= '<tr><td>'.Html::image('files/logo.jpg') .'</td><td><strong>QUESTIONS FOR FORMATIVE ASSESSMENT IN RWANDA</strong></td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td><hr></td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%">';
       $table .= '<tr><td><strong>Grade:</strong> '.$grade->grade_name.'</td></tr>';
        $table .= '<tr><td><strong>Subject:</strong> '.$subject->subject_title.'</td></tr>';

        $table .= '<tr><td><strong>Unit 1:</strong> '.$unit->unit_name.'</td></tr>';

        $table .= '<tr><td><strong>Key Unit Competence:</strong> '.$unit->kuc.'</td></tr>';

        $table .= '<tr><td><strong>Assessment Criteria:</strong> '.$unit->ac.'</td></tr>';

        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td>&nbsp;</td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%" border="1" cellpadding="1" cellspacing="1">';
        $table .= '<tr bgcolor="#35A6CE"><th width="5%"><font color="#ffffff"><strong>ID</strong></font></th><th width="15%"><font color="#ffffff"><strong>SKILLS</strong></font></th><th width="40%"><font color="#ffffff"><strong>QUESTION</strong></font></th><th width="40%"><font color="#ffffff"><strong>ANSWER</strong></font></th></tr>';

        $table .= '<tr><td width="5%">'.$question->id.'</td><td width="15%">'.$question->skill->skill.'</td><td width="40%">'.$question->question.'</td><td width="40%">'.$question->answer.'</td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td>&nbsp;</td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%" border="1" cellpadding="1" cellspacing="1">';
        $table .= '<tr bgcolor="#35A6CE"><td><font color="#ffffff"><strong>GUIDE ON HOW TO USE THIS QUESTION</strong></font></td></tr>';
        $table .= '<tr><td>'.$question->guide.'</td></tr>';
        $table .= '</table>';


        PDF::SetTitle('REB QUESTION DATABANK - QUESTION No.'.$question->id.'');
        PDF::AddPage('L');
        PDF::writeHTML($table, true, false, true, false, '');

        PDF::Output('Question_'.$question->id.'.pdf');

    }

    public function downloads(Request $request)
    {
        $unit = Unit::find($request->unit_id);
        $subject = Subject::find($request->subject_id);
        $grade = Grade::find($request->grade_id);

        $q = Questiondatabank::query();

        if ($request->has('grade_id'))
        {
            $q->where('grade_id', $request->grade_id);
        }

        if ($request->has('subject_id'))
        {
            $q->where('subject_id', $request->subject_id);
        }

        if ($request->has('unit_id'))
        {
            $q->where('unit_id', $request->unit_id);
        }

        $results = $q->orderBy('id')->get();

        $table = '<table width="100%">';
        $table .= '<tr><td>'.Html::image('files/logo.jpg') .'</td><td><strong>QUESTIONS FOR FORMATIVE ASSESSMENT IN RWANDA</strong></td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td><hr></td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td><strong>Grade:</strong> '.$grade->grade_name.'</td></tr>';
        $table .= '<tr><td><strong>Subject:</strong> '.$subject->subject_title.'</td></tr>';

        $table .= '<tr><td><strong>Unit 1:</strong> '.$unit->unit_name.'</td></tr>';

        $table .= '<tr><td><strong>Key Unit Competence:</strong> '.$unit->kuc.'</td></tr>';

        $table .= '<tr><td><strong>Assessment Criteria:</strong> '.$unit->ac.'</td></tr>';

        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td>&nbsp;</td></tr>';
        $table .= '</table>';

        $table .= '<table width="100%" border="1" cellpadding="1" cellspacing="1">';
        $table .= '<tr bgcolor="#35A6CE"><th width="5%"><font color="#ffffff"><strong>ID</strong></font></th><th width="15%"><font color="#ffffff"><strong>SKILLS</strong></font></th><th width="40%"><font color="#ffffff"><strong>QUESTION</strong></font></th><th width="40%"><font color="#ffffff"><strong>ANSWER</strong></font></th></tr>';


        foreach ($results as $result):

            $table .= '<tr><td width="5%">'.$result->id.'</td><td width="15%">'.$result->skill->skill.'</td><td width="40%">'.$result->question.'</td><td width="40%">'.$result->answer.'</td></tr>';

        endforeach;

        $table .= '</table>';

        $table .= '<table width="100%">';
        $table .= '<tr><td>&nbsp;</td></tr>';
        $table .= '</table>';

        $table .= '<br pagebreak="true">';

        $table .= '<table width="100%" border="1" cellpadding="1" cellspacing="1">';
        $table .= '<tr bgcolor="#35A6CE"><td><font color="#ffffff"><strong>GUIDES ON HOW TO USE THE QUESTIONS</strong></font></td></tr>';

        foreach ($results as $result):
            $table .= '<tr><td><strong>QUESTION ID '.$result->id.':</strong>'.$result->guide.'</td></tr>';

        endforeach;

        $table .= '</table>';


        PDF::SetTitle('REB QUESTION DATABANK '.strtoupper($subject->subject_title).' '.strtoupper($unit->unit_name).'');
        PDF::AddPage('L');
        PDF::writeHTML($table, true, false, true, false, '');

        PDF::Output('Question_Data_bank_'.$request->unit_id.'.pdf');

    }
}
