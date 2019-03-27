<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use App\Student;
use App\Semester;
use App\Grade;
use App\School;
use App\Studyfield;
use App\Unit;
use App\Subject;
use App\District;
use DB;
use Session;
use File;

class ReportController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $semesters = Semester::all();
        $grades = Grade::all();
        $studyfields = Studyfield::all();

        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-1; $year <= $current_year; $year++) $years[$year] = $year;

        return view('reports.index',compact('semesters', 'students','years','grades','studyfields'));
    }

    public function searchstudentresults(Request $request)
    {
        $unique_identifier = $request->unique_identifier;
        $semester_id = $request->semester_id;
        $semesters = Semester::all();
        $trimester = Semester::find($request->semester_id);

        $student = DB::table('students')->where('unique_identifier', $unique_identifier)->first();

        if(!empty($student))
        {
            $student_name = $student->student_name;
            $school = School::find($student->school_id);
            $school_name = $school->school_name;
            $grade = Grade::find($student->grade_id);
            $grade_name = $grade->grade_name;
            $error = '';
        }
        else
        {
            $student_name = '';
            $school_name = '';
            $grade_name = '';

            $error = 'There is no student with the records entered.';
        }

        $years = [];
        $current_year = date('Y');
        for ($year=$current_year-1; $year <= $current_year; $year++) $years[$year] = $year;


        return view('reports.studentresults',compact('error','semesters', 'trimester', 'years','semester_id', 'unique_identifier', 'student_name', 'school_name', 'grade_name'));


    }

    public function studentresults(Request $request)
    {

        $unique_identifier = $request->unique_identifier;
        $semester_id = $request->semester_id;
        $studyfield_id = $request->studyfield_id;
        $semesters = Semester::all();
        $trimester = Semester::find($request->semester_id);
        $studyfields = Studyfield::all();

        $student = DB::table('students')->where('unique_identifier', $unique_identifier)->first();

        if(!empty($student))
        {
            $student_name = $student->student_name;
            $school = School::find($student->school_id);
            $school_name = $school->school_name;
            $grade = Grade::find($student->grade_id);
            $grade_name = $grade->grade_name;
            $error = '';

            $whereData = [
                ['studyfield_id', $studyfield_id],
                ['grade_id', $grade->id]
            ];

            $subject = DB::table('subjects')->where($whereData)->first();

            $subject_title = $subject->subject_title;
        }
        else
        {
            $student_name = '';
            $school_name = '';
            $grade_name = '';

            $subject_title = '';

            $error = 'There is no student with the records entered.';
        }


        return view('reports.studentsubjectresults',compact('error','semesters', 'trimester', 'years','semester_id', 'unique_identifier', 'student_name', 'school_name', 'grade_name','subject_title','studyfields','studyfield_id'));


    }

    public function classroomsearch()
    {

        $semesters = Semester::all();
        $schools = School::all();

        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        $studyfields = Studyfield::all();
        $districts = District::all();


        return view('reports.classroomsearch',compact('districts', 'units', 'subjects', 'grades', 'schools','semesters', 'studyfields'));

    }

    public function searchclassroom(Request $request)
    {
        $district_id = $request->district_id;
        $sector_id = $request->sector_id;
        $school_id = $request->school_id;
        $grade_id = $request->gradeID;
        $studyfield_id = $request->studyfield_id;
        $semester_id = $request->semester_id;

        $whereData = [
            ['studyfield_id', $studyfield_id],
            ['grade_id', $grade_id]
        ];

        $subject = DB::table('subjects')->where($whereData)->first();


        $thedistrict = District::find($district_id);
        $thesector = Sector::find($sector_id);
        $theschool = School::find($school_id);
        $thegrade = Grade::find($grade_id);
        $thestudyfield = Studyfield::find($studyfield_id);

        $trimester = Semester::find($semester_id);

        $semesters = Semester::all();

        $grades = Grade::all();
        $studyfields = Studyfield::all();
        $districts = District::all();

        return view('reports.searchclassroom',compact('grades', 'thegrade','thedistrict', 'thesector','theschool','trimester','subject','semesters','districts','studyfields','thestudyfield'));

    }

    public function searchclassroomunit(Request $request)
    {

        $district_id = $request->districtID;
        $sector_id = $request->sectorID;
        $school_id = $request->schoolID;
        $grade_id = $request->grade_id;
        $studyfield_id = $request->studyfield_id;
        $semester_id = $request->semester_id;
        $unit_id = $request->unit_id;
        $subject_id = $request->subject_id;


        $thedistrict = District::find($district_id);
        $thesector = Sector::find($sector_id);
        $theschool = School::find($school_id);
        $thegrade = Grade::find($grade_id);
        $thestudyfield = Studyfield::find($studyfield_id);
        $theunit = Unit::find($unit_id);
        $thesubject = Subject::find($subject_id);

        $trimester = Semester::find($semester_id);

        $semesters = Semester::all();

        $grades = Grade::all();
        $studyfields = Studyfield::all();
        $districts = District::all();

       return view('reports.searchclassroomunit',compact('grades', 'thegrade','thedistrict', 'thesector','theschool','trimester','thesubject','semesters','districts','studyfields','thestudyfield','theunit'));


    }
}
