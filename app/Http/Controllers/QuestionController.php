<?php

namespace App\Http\Controllers;

use App\Question;
use App\Subject;
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
        $result = Question::latest()->paginate();

        return view('question.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::pluck('name', 'id');

        return view('question.new', compact('subject'));
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
            'question' => 'required|min:10',
            'option1' => 'required',
            'option2' => 'required',
            'answer' => 'required',
        ]);

        // Create the category
        if ( $question = Question::create($request->only('question','option1','option2','option3','option4','answer','subject_id'))){
            flash('Question has been created.');
        } else {
            flash()->error('Unable to create question.');
        }

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $subject = Subject::pluck('name', 'id');

        return view('question.edit', compact('question','subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required|min:10',
            'option1' => 'required',
            'option2' => 'required',
            'answer' => 'required',
        ]);

        // Get the user
        $question = Question::findOrFail($id);

        // Update user
        $question->fill($request->only('question','option1','option2','option3','option4','answer','subject_id'));

        $question->save();

        flash()->success('Question has been updated.');

        return redirect()->route('questions.index');
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
}
