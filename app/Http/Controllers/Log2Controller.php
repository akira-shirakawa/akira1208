<?php

namespace App\Http\Controllers;

use App\Log2;
use Illuminate\Http\Request;
use Auth; 
use App\Log;
class Log2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {if(!empty(Auth::id())){
     if(empty(Log2::where('user_id',Auth::id())->where('question_id',$request->question_id)->get()->first())){
         
          $message=new Log2;
          $message->user_id=Auth::id();
          $message->question_id=$request->question_id;
          $message->save(); 
         
         
          
     }
     Log::where('user_id',Auth::id())->where('question_id',$request->question_id)->delete(); 
    }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log2  $log2
     * @return \Illuminate\Http\Response
     */
    public function show(Log2 $log2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log2  $log2
     * @return \Illuminate\Http\Response
     */
    public function edit(Log2 $log2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log2  $log2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log2 $log2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log2  $log2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log2 $log2)
    {
        //
    }
}
