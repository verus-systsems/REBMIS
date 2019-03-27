<?php

namespace App\Http\Controllers;
use App\Questiondatabank;
use App\Unit;
use App\Subject;
use App\Grade;
use App\Skill;
use App\Tool;
use DB;
use Session;
use File;
use Illuminate\Http\Request;

class QuestiondatabankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questiondatabank::latest()->paginate(10);
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('questiondatabanks.index',compact('questions','units', 'subjects', 'grades'))
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
        $skills = Skill::all();
        return view('questiondatabanks.create',compact('units','subjects','grades','skills'));
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
            'the_content' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'grade_id' => 'required',
            'subject_id' => 'required',
            'unit_id' => 'required',
            'skill_id' => 'required',
        ]);

        $user_id = \Auth::id();

        $questiondatabank_id = DB::table('questiondatabanks')->insertGetId([
            'content' => $request->the_content,
            'question' => $request->question,
            'answer' => $request->answer,
            'results' => $request->results,
            'guide' => $request->guide,
            'multimedia' => $request->multimedia,
            'grade_id' => $request->grade_id,
            'subject_id' => $request->subject_id,
            'unit_id' => $request->unit_id,
            'skill_id' => $request->skill_id,
            'user_id' => $user_id,
            'hits' => 0,
            'downloads' =>0,
            'approved' =>0,
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
                    'questiondatabank_id' => $questiondatabank_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

            }

            Tool::insert($filenames);

        }

        return redirect()->route('questiondatabanks.index')
            ->with('success','Question created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        $skills = Skill::all();
        $questiondatabank = Questiondatabank::find($id);
        return view('questiondatabanks.edit',compact('units','subjects','grades','skills', 'questiondatabank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'the_content' => 'required',
            'question' => 'required',
            'answer' => 'required',

        ]);

        DB::table('questiondatabanks')
            ->where('id', $id)
            ->update(['content' => $request->the_content,
                'question' => $request->question,
                'answer' => $request->answer,
                'results' => $request->results,
                'multimedia' => $request->multimedia,
                'guide' => $request->guide,
                'updated_at' => date('Y-m-d H:i:s'),]);


        return redirect()->route('questiondatabanks.index')
            ->with('success','Question updated successfully');
    }

    public function export()
    {


        $table = '<table class="GridTable4-Accent11" border="1" cellspacing="0" cellpadding="0" width="101%" style="border: none;">
 <tbody>
 <tr><td colspan="4"><strong>Unit 1:</strong> Reading, writing, comparing and calculating whole numbers up to 1,000,000</td></tr>
<tr><td colspan="4"><strong>Key Unit Competence:</strong> To be able to read, write, compare and make calculations on whole numbers up to 1,000,000</td></tr>
<tr><td colspan="4"><strong>Assessment Criteria:</strong> Learners should read, write, compare and solve mathematical problems that involve the calculations up to 1,000,000</td></tr>
 
 <tr style="mso-yfti-irow:-1;mso-yfti-firstrow:yes;height:25.15pt">
  <td width="2%" valign="top" style="width: 2.84%; border-width: 1pt; border-color: windowtext; background: rgb(91, 155, 213); padding: 0in 5.4pt; height: 25.15pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:5"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; background: rgb(91, 155, 213); padding: 0in 5.4pt; height: 25.15pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:1"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Skills</span></b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; background: yellow; padding: 0in 5.4pt; height: 25.15pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:1"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Questions 1</span></b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; background: rgb(91, 155, 213); padding: 0in 5.4pt; height: 25.15pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:1"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Answers 1<o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:0;height:17.05pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 17.05pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:68"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">1<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 17.05pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">Re<span style="letter-spacing:-.05pt">a</span><span style="letter-spacing:.05pt">d</span>i<span style="letter-spacing:.05pt">n</span>g<span style="letter-spacing:-.05pt">an</span>d<span style="letter-spacing:.05pt">w</span><span style="letter-spacing:-.05pt">r</span><span style="letter-spacing:.1pt">i</span><span style="letter-spacing:-.05pt">t</span>i<span style="letter-spacing:-.05pt">n</span>g<span style="letter-spacing:-.05pt">n</span><span style="letter-spacing:.05pt">u</span>mb<span style="letter-spacing:-.05pt">er</span>s<span style="letter-spacing:.05pt">u</span>p<span style="letter-spacing:.05pt">t</span>o<span style="letter-spacing:-.05pt">1,0</span><span style="letter-spacing:.1pt">0</span><span style="letter-spacing:-.05pt">0,</span><span style="letter-spacing:.1pt">0</span><span style="letter-spacing:-.05pt">0</span><span style="letter-spacing:.1pt">0</span>: </span></b><span style="font-size:12.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria;letter-spacing:
  .05pt">R</span><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria;letter-spacing:-.1pt">e</span><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:
  Cambria;letter-spacing:.05pt">a</span><span style="font-size:12.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria">d<span style="letter-spacing:-.05pt">in</span>g<span style="letter-spacing:.05pt">a</span><span style="letter-spacing:-.05pt">n</span>d<span style="letter-spacing:-.05pt">wr</span><span style="letter-spacing:.1pt">i</span>t<span style="letter-spacing:-.05pt">i</span><span style="letter-spacing:.05pt">n</span>gin<span style="letter-spacing:-.05pt">w</span>o<span style="letter-spacing:-.05pt">r</span>ds.</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 17.05pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">&nbsp;John
  banked 4178200 frw after selling his car. Write the amount of that money in
  words <a name="_GoBack"></a><o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 17.05pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Four million one hundred seventy eight
  thousand and two hundred<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:1;height:13.0pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0in 5.4pt; height: 13pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:4"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">2<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt; height: 13pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">Re<span style="letter-spacing:-.05pt">a</span><span style="letter-spacing:.05pt">d</span>i<span style="letter-spacing:.05pt">n</span>g<span style="letter-spacing:-.05pt">an</span>d<span style="letter-spacing:.05pt">w</span><span style="letter-spacing:-.05pt">r</span><span style="letter-spacing:.1pt">i</span><span style="letter-spacing:-.05pt">t</span>i<span style="letter-spacing:-.05pt">n</span>g<span style="letter-spacing:-.05pt">n</span><span style="letter-spacing:.05pt">u</span>mb<span style="letter-spacing:-.05pt">er</span>s<span style="letter-spacing:.05pt">u</span>p<span style="letter-spacing:.05pt">t</span>o<span style="letter-spacing:-.05pt">1,0</span><span style="letter-spacing:.1pt">0</span><span style="letter-spacing:-.05pt">0,</span><span style="letter-spacing:.1pt">0</span><span style="letter-spacing:-.05pt">0</span><span style="letter-spacing:.1pt">0</span>: </span></b><span style="font-size:12.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria;letter-spacing:
  .05pt">R</span><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria;letter-spacing:-.1pt">e</span><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:
  Cambria;letter-spacing:.05pt">a</span><span style="font-size:12.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria">d<span style="letter-spacing:-.05pt">in</span>g<span style="letter-spacing:.05pt">a</span><span style="letter-spacing:-.05pt">n</span>d<span style="letter-spacing:-.05pt">wr</span><span style="letter-spacing:.1pt">i</span>t<span style="letter-spacing:-.05pt">i</span><span style="letter-spacing:.05pt">n</span>gin<span style="letter-spacing:-.05pt">f</span><span style="letter-spacing:.1pt">i</span>gu<span style="letter-spacing:.05pt">r</span><span style="letter-spacing:-.1pt">e</span>s.</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 13pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">There are two hundred thousand six hundred
  eight one English books for reading. what is that number of the books in
  figures?<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt; height: 13pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">200681<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:2;height:1.0pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:68"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">3<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">P<span style="letter-spacing:.05pt">l</span><span style="letter-spacing:-.05pt">a</span>ce<span style="letter-spacing:.1pt">v</span><span style="letter-spacing:-.05pt">a</span><span style="letter-spacing:.05pt">lu</span>e<span style="letter-spacing:-.05pt">an</span>d c<span style="letter-spacing:-.05pt">o</span>m<span style="letter-spacing:.05pt">pa</span><span style="letter-spacing:-.05pt">r</span>i<span style="letter-spacing:-.05pt">n</span>g<span style="letter-spacing:-.05pt">n</span><span style="letter-spacing:.05pt">u</span>mb<span style="letter-spacing:.1pt">e</span><span style="letter-spacing:-.05pt">r</span><span style="letter-spacing:.1pt">s</span>:
  </span></b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria;letter-spacing:-.05pt">P</span><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:
  Cambria;letter-spacing:.05pt">la</span><span style="font-size:12.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria">cev<span style="letter-spacing:.05pt">al</span>ueof<span style="letter-spacing:-.05pt">n</span>um<span style="letter-spacing:.05pt">be</span><span style="letter-spacing:-.05pt">r</span>supto7d<span style="letter-spacing:-.05pt">i</span>gi<span style="letter-spacing:-.05pt">t</span>s.</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">What is the place value of 0 and 9 in the
  numbers bolow:<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">a.</span></b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">70595624<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">b. </span></b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">2016829<b><o:p></o:p></b></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">a.i)The place&nbsp; value of 0 is million<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;">&nbsp; ii)The place value of 9 is ten thousand<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;">b.i)
  The place value of 0 is hundred thousand<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;">&nbsp; ii) the place value of 9 is ones<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:3;height:1.0pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:4"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">4<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">P<span style="letter-spacing:.05pt">l</span><span style="letter-spacing:-.05pt">a</span>ce<span style="letter-spacing:.1pt">v</span><span style="letter-spacing:-.05pt">a</span><span style="letter-spacing:.05pt">lu</span>e<span style="letter-spacing:-.05pt">an</span>d c<span style="letter-spacing:-.05pt">o</span>m<span style="letter-spacing:.05pt">pa</span><span style="letter-spacing:-.05pt">r</span>i<span style="letter-spacing:-.05pt">n</span>g<span style="letter-spacing:-.05pt">n</span><span style="letter-spacing:.05pt">u</span>mb<span style="letter-spacing:.1pt">e</span><span style="letter-spacing:-.05pt">r</span><span style="letter-spacing:.1pt">s</span>:
  </span></b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">Co<span style="letter-spacing:-.05pt">mp</span><span style="letter-spacing:.05pt">a</span><span style="letter-spacing:-.05pt">r</span>i<span style="letter-spacing:.05pt">n</span>g<span style="letter-spacing:-.05pt">n</span>u<span style="letter-spacing:.1pt">m</span><span style="letter-spacing:-.1pt">b</span><span style="letter-spacing:.05pt">e</span><span style="letter-spacing:-.05pt">r</span>susi<span style="letter-spacing:-.05pt">n</span>g&lt;,&gt;<span style="letter-spacing:
  .1pt">o</span>r=</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Compare the following using &lt;,&gt; or =<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">a)3651 ……… 36510<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">b)6026 278……….5720949<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">a)3651 &lt; 36510<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">b)6026278 &gt; 5720949<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:4;height:1.0pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:68"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">5<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">O<span style="letter-spacing:.05pt">p</span>e<span style="letter-spacing:-.05pt">ra</span><span style="letter-spacing:.05pt">t</span>i<span style="letter-spacing:-.05pt">o</span><span style="letter-spacing:.1pt">n</span><span style="letter-spacing:-.05pt">s</span>: </span></b><span style="font-size:
  12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria">Ad<span style="letter-spacing:-.05pt">d</span>i<span style="letter-spacing:-.05pt">t</span>i<span style="letter-spacing:.1pt">o</span>nof3or m<span style="letter-spacing:-.05pt">o</span><span style="letter-spacing:.05pt">r</span>e<span style="letter-spacing:-.05pt">w</span>hole<span style="letter-spacing:-.05pt">n</span>um<span style="letter-spacing:.05pt">be</span><span style="letter-spacing:-.05pt">r</span>sof7d<span style="letter-spacing:.1pt">i</span>gi<span style="letter-spacing:-.05pt">t</span>s ,<span style="letter-spacing:-.05pt">
  withorwithoutcarrying</span>.</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">The table below shows the number of books
  which are in different schools. <o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">&nbsp;<o:p></o:p></span></p>
  <table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" style="border: none;">
   <tbody><tr>
    <td width="97" valign="top" style="width: 48.35pt; border-width: 1pt; border-color: windowtext; padding: 0in 5.4pt;">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">crimson<o:p></o:p></span></p>
    </td>
    <td width="108" valign="top" style="width: 0.75in; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0in 5.4pt;">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">GS. GIHARA<o:p></o:p></span></p>
    </td>
    <td width="117" valign="top" style="width: 58.5pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0in 5.4pt;">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Morning star<o:p></o:p></span></p>
    </td>
   </tr>
   <tr>
    <td width="97" valign="top" style="width: 48.35pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0in 5.4pt;">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">8123264<o:p></o:p></span></p>
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">books<o:p></o:p></span></p>
    </td>
    <td width="108" valign="top" style="width: 0.75in; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt;">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">1005100<o:p></o:p></span></p>
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">books<o:p></o:p></span></p>
    </td>
    <td width="117" valign="top" style="width: 58.5pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt;">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">543100 books<o:p></o:p></span></p>
    </td>
   </tr>
  </tbody></table>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">&nbsp;Calculate the sum of books which are in
  crimson and GS.GIHARA <o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Sum =8666364 books <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:5;height:1.0pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:4"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">6<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">O<span style="letter-spacing:.05pt">p</span>e<span style="letter-spacing:-.05pt">ra</span><span style="letter-spacing:.05pt">t</span>i<span style="letter-spacing:-.05pt">o</span><span style="letter-spacing:.1pt">n</span><span style="letter-spacing:-.05pt">s</span>: </span></b><span style="font-size:
  12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria;
  letter-spacing:-.05pt">S</span><span style="font-size:12.0pt;font-family:
  &quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria">u<span style="letter-spacing:.05pt">b</span>t<span style="letter-spacing:-.05pt">r</span><span style="letter-spacing:.05pt">a</span>ct<span style="letter-spacing:-.05pt">i</span><span style="letter-spacing:.1pt">o</span>nof2<span style="letter-spacing:-.05pt">w</span>hole<span style="letter-spacing:-.05pt">n</span>u<span style="letter-spacing:.1pt">m</span><span style="letter-spacing:.05pt">b</span><span style="letter-spacing:-.1pt">e</span><span style="letter-spacing:-.05pt">r</span>s<span style="letter-spacing:.1pt">o</span>f7d<span style="letter-spacing:-.05pt">i</span>gi<span style="letter-spacing:-.05pt">t</span>s<span style="letter-spacing:-.05pt">w</span>i<span style="letter-spacing:-.05pt">t</span>hor<span style="letter-spacing:-.05pt">w</span>i<span style="letter-spacing:-.05pt">t</span>hout<span style="letter-spacing:.05pt">b</span>o<span style="letter-spacing:-.05pt">r</span><span style="letter-spacing:.05pt">r</span>o<span style="letter-spacing:-.05pt">w</span><span style="letter-spacing:.1pt">i</span><span style="letter-spacing:-.05pt">n</span>g.</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Take away 2015810 from 7368921<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">5353111<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:6;mso-yfti-lastrow:yes;height:1.0pt">
  <td width="2%" valign="top" style="width: 2.84%; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:68"><b><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">7<o:p></o:p></span></b></p>
  </td>
  <td width="35%" valign="top" style="width: 35.44%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><b><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  mso-fareast-font-family:Cambria">O<span style="letter-spacing:.05pt">p</span>e<span style="letter-spacing:-.05pt">ra</span><span style="letter-spacing:.05pt">t</span>i<span style="letter-spacing:-.05pt">o</span><span style="letter-spacing:.1pt">n</span><span style="letter-spacing:-.05pt">s</span>: </span></b><span style="font-size:
  12.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Cambria">Mu<span style="letter-spacing:.05pt">l</span>t<span style="letter-spacing:-.05pt">ip</span><span style="letter-spacing:.05pt">l</span>yi<span style="letter-spacing:-.05pt">n</span>g<span style="letter-spacing:-.05pt">w</span>hole<span style="letter-spacing:-.05pt">n</span>um<span style="letter-spacing:.05pt">be</span><span style="letter-spacing:-.05pt">r</span>s<span style="letter-spacing:-.1pt">b</span>ya3d<span style="letter-spacing:-.05pt">i</span>git<span style="letter-spacing:-.05pt">n</span>um<span style="letter-spacing:.05pt">be</span><span style="letter-spacing:-.05pt">r</span>.</span><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p></o:p></span></p>
  </td>
  <td width="33%" valign="top" style="width: 33.72%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: yellow; padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">Fill in the missing number<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">a)4629× 135&nbsp;&nbsp;&nbsp;&nbsp; =…………<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">b)2560&nbsp;
  × ………=624640<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="27%" valign="top" style="width: 27.98%; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(222, 234, 246); padding: 0in 5.4pt; height: 1pt;">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">a)643431<o:p></o:p></span></p>
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal;mso-yfti-cnfc:64"><span style="font-size: 12pt; font-family: Tahoma, sans-serif;">b)244<o:p></o:p></span></p>
  </td>
 </tr>
</tbody></table>';

        $filename = "Questions".date('dmY-his').".xls";

        return response($table)
            ->header('Content-Type', 'application/vnd.ms-excel; charset=utf-8')
            ->header('Expires', '0')
            ->header('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
            ->header('content-disposition', 'attachment;filename='.$filename.'');

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
