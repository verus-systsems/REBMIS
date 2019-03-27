<?php

namespace App\Http\Controllers;

use App\Document;
use App\Documentcategory;
use App\Unit;
use App\Subject;
use App\Grade;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('documents.index',compact('documents'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentcategories = Documentcategory::all();
        $units = Unit::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('documents.create',compact('documentcategories', 'units', 'subjects', 'grades'));
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
            'title' => 'required',
            'attachment' => 'required',
            'grade_id' => 'required',
            'subject_id' => 'required',
            'unit_id' => 'required',
        ]);

        $user_id = \Auth::id();

        $file = $request->file('attachment');
        $destinationPath = 'files';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('documents')->insertGetId([
            'title' => $request->title,
            'decription' => $request->decription,
            'document_name' => $file->getClientOriginalName(),
            'document_type' =>  $file->getClientOriginalExtension(),
            'document_size' => '',
            'documentcategory_id' => $request->documentcategory_id,
            'grade_id' => $request->grade_id,
            'subject_id'=> $request->subject_id,
            'unit_id' => $request->unit_id,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('documents.index')
            ->with('success','Document created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $documentcategories = Documentcategory::all();
        return view('documents.show',compact('document','documentcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $documentcategories = Documentcategory::all();
        return view('documents.edit',compact('document', 'documentcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        request()->validate([
            'title' => 'required',
        ]);

        $document->update($request->all());

        return redirect()->route('documents.index')
            ->with('success','Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
