<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $result = Contest::where('user_id', Auth::id())->latest()->paginate();

         return view('contest.index', compact('result'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $questions = Question::all();

         return view('contest.new', compact('questions'));
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
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        //
    }

    public function userAnswer($id,$user_answer)
    {
        $matchThese = array('question_id'=>$id,'user_id'=>Auth::id());
        $answer = Contest::updateOrCreate($matchThese,['user_answer'=>$user_answer]);
        $answer->save();
        return $answer;
    }
}
