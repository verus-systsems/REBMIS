<?php

namespace App\Http\Controllers;

use App\Documentcategory;
use Illuminate\Http\Request;

class DocumentcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentcategories = Documentcategory::latest()->paginate(10);
        return view('documentcategories.index',compact('documentcategories'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentcategories.create');
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
            'category' => 'required',
        ]);


        Documentcategory::create($request->all());


        return redirect()->route('documentcategories.index')
            ->with('success','Document Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documentcategory  $documentcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Documentcategory $documentcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documentcategory  $documentcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Documentcategory $documentcategory)
    {
        return view('documentcategories.edit',compact('documentcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documentcategory  $documentcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documentcategory $documentcategory)
    {
        request()->validate([
            'category' => 'required',
        ]);

        $documentcategory->update($request->all());

        return redirect()->route('documentcategories.index')
            ->with('success','Document category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documentcategory  $documentcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentcategory $documentcategory)
    {
        //
    }
}
