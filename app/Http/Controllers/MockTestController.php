<?php

namespace App\Http\Controllers;

use App\MockTest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MockTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = MockTest::where('user_id', Auth::id())->latest()->paginate();

        return view('mocktest.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();

        return view('mocktest.new', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MockTest  $mockTest
     * @return \Illuminate\Http\Response
     */
    public function show(MockTest $mockTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MockTest  $mockTest
     * @return \Illuminate\Http\Response
     */
    public function edit(MockTest $mockTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MockTest  $mockTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MockTest $mockTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MockTest  $mockTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MockTest $mockTest)
    {
        //
    }

    public function userAnswer($id,$user_answer)
    {
        $matchThese = array('question_id'=>$id,'user_id'=>Auth::id());
        $answer = MockTest::updateOrCreate($matchThese,['user_answer'=>$user_answer]);
        $answer->save();
        return $answer;
    }
}
