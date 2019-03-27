<?php

namespace App\Http\Controllers;

use App\Content;
use DB;
use Session;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::latest()->paginate(10);

        return view('contents.index',compact('contents'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
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
            'summary' => 'required',
            'full_content' => 'required',
        ]);

        DB::table('contents')->insertGetId([
            'title' => $request->title,
            'summary' => $request->summary,
            'full_content' => $request->full_content,
            'key_words' => $request->key_words,
            'meta_data' => $request->meta_data,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('contents.index')
            ->with('success','Content created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        return view('contents.edit',compact( 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => 'required',
            'summary' => 'required',
            'full_content' => 'required',
        ]);

        DB::table('contents')
            ->where('id', $id)
            ->update(['title' => $request->title,
                'summary' => $request->summary,
                'full_content' => $request->full_content,
                'key_words' => $request->key_words,
                'meta_data' => $request->meta_data,
                'updated_at' => date('Y-m-d H:i:s'),]);


        return redirect()->route('contents.index')
            ->with('success','Content updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
