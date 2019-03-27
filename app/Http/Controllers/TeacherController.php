<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\School;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teachers.index',compact('teachers'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('teachers.create', compact('schools'));
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
            'name' => 'required',
            'service_number' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'highest_qualification' => 'required',
            'school_id' => 'required',
        ]);

        $password = Hash::make('12345');

        $user_id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $user = User::find($user_id);
        $roles = array();
        $roles[] = '2';
        $user->assignRole($roles);

        $input = $request->all();
        $input['user_id'] = $user_id;


        Teacher::create($input);

        return redirect()->route('teachers.index')
            ->with('success','Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $schools = School::all();
        return view('schools.edit',compact('teacher','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        request()->validate([
            'name' => 'required',
            'service_number' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'highest_qualification' => 'required',
            'school_id' => 'required',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')
            ->with('success','Teacher updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
