<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function(){

    Route::get('post/{id}/comments', function($id){
      return \App\Ask::findOrFail($id)->comments;
    });

    Route::post('post/{id}/comment',function($id, Request $request){
      $user = \App\User::first();

      return \App\Ask::findOrFail($id)->comment($request->all(),$user);
    });

    Route::patch('post/{id}/comment/{comment_id}', function($id,$comment_id,Request $request){
      return \App\Ask::findOrFail($id)->updateComment($comment_id, $request->all());
    });

    Route::delete('post/{id}/comment/{comment_id}', function($id,$comment_id){
       return \App\Ask::findOrFail($id)->deleteComment($comment_id);
    });

});
