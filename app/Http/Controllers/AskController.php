<?php

namespace App\Http\Controllers;

use App\Ask;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Ask::latest()->paginate();

        return view('ask.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('ask.new', compact('categories'));
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
        $this->validate($request, [
            'question' => 'required|min:10|max:255'
        ]);

        $ask = new Ask();
        $ask->user_id = Auth::id();
        $ask->category_id = $request->category_id;
        $ask->question = $request->question;

        // Create the category
        if ( $ask->save()){
            flash('Ask has been posted.');
        } else {
            flash()->error('Unable to post of ask.');
        }

        return redirect()->route('asks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function show(Ask $ask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function edit(Ask $ask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ask $ask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask)
    {
        //
    }
}
