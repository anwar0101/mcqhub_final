<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Category;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result = Subject::latest()->paginate();

      return view('subject.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name', 'id');

        return view('subject.new', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        // Create the category
        if ( $subject = Subject::create($request->only('name','category_id'))){
            flash('Subject has been created.');
        } else {
            flash()->error('Unable to create subject.');
        }

        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subject = Subject::find($id);
        $category = Category::pluck('name', 'id');

        return view('subject.edit', compact('subject','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        // Get the user
        $subject = Subject::findOrFail($id);

        // Update user
        $subject->fill($request->only('name', 'category_id'));

        $subject->save();

        flash()->success('Subject has been updated.');

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
