<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Question;
use App\Topic;
use App\Unit;
use App\Subject;
use App\Grade;
use App\Skill;
use DB;
use Session;
use File;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(10);
        return view('questions.index',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('questions.create',compact('topics','units','subjects','grades'));
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
            'question' => 'required',
            'topic_id' => 'required',
        ]);

        $file = $request->file('image');
        $destinationPath = 'public/files';

        if(empty($file))
        {
            $image = '';
        }
        else
        {
            $file->move($destinationPath,$file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        }

        $question_id = DB::table('questions')->insertGetId([
            'question' => $request->question,
            'image' => $image,
            'topic_id' => $request->topic_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        foreach ($request->choice as $key=>$choice) {
            if($key==0)
            {
                $correct_answer = 1;
            }
            else
            {
                $correct_answer = 0;
            }
            $answers[] = [
                'choice' => $choice,
                'correct_answer' => $correct_answer,
                'question_id' => $question_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        Choice::insert($answers);

        return redirect()->route('questions.index')
            ->with('success','Question created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $topics = Topic::all();
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        $choices = Choice::where('question_id',$question->id)->inRandomOrder()->get();

        return view('questions.show',compact('topics','units','subjects','grades', 'question','choices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $topics = Topic::all();
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        $choices = Choice::where('question_id',$question->id)->inRandomOrder()->get();

        return view('questions.edit',compact('topics','units','subjects','grades', 'question','choices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        request()->validate([
            'question' => 'required',
        ]);

        $file = $request->file('image');
        $destinationPath = 'public/files';

        if(empty($file))
        {
            $image = $request->old_image;
        }
        else
        {
            $file->move($destinationPath,$file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        }

        $id =  $request->id;

        DB::table('questions')
            ->where('id', $id)
            ->update([
                'question' => $request->question,
                'image' => $image,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);


        return redirect()->route('questions.index')
            ->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function getsubjects($id)
    {

        $subjects = Subject::where('grade_id',$id)->get();

        $select = '<select name="subject_id" id="subject_id" class="span6" onChange="unitFunction()" required="required">';

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

        $select = '<select name="unit_id" id="unit_id" class="span6" onChange="skillFunction()" required="required">';

        $select .= '<option value="">Select Unit</option>';

        foreach ($units as $unit):

            $select .= '<option value="'.$unit->id.'">'.$unit->unit_name.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }

    public function gettopics($id)
    {
        $topics = Topic::where('unit_id',$id)->get();

        $select = '<select name="topic_id" id="topic_id" class=span6" required="required">';

        $select .= '<option value="">Select Topic</option>';

        foreach ($topics as $topic):

            $select .= '<option value="'.$topic->id.'">'.$topic->topic.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }

    public function getskills($id)
    {
        $skills = Skill::where('unit_id',$id)->get();

        $select = '<select name="skill_id" id="skill_id" class="span6" required="required">';

        $select .= '<option value="">Select Skill</option>';

        foreach ($skills as $skill):

            $select .= '<option value="'.$skill->id.'">'.$skill->skill.'</option>';

        endforeach;

        $select .= '</select>';

        echo $select;
    }
}
