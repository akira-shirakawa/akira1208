<?php

namespace App\Http\Controllers;

use App\Homework;
use Illuminate\Http\Request;
use Storage;



class HomeworkController extends Controller
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
{               $filename = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('public', $filename);
                $contents = Storage::get('public/'.$filename);
                $pa=Storage::disk('s3')->put($filename, $contents, 'public'); // Ｓ３にアップ
                $image= Storage::disk('s3')->url($filename);
                
                                   
                                   $message = new Homework;
                                    $message->user_id =$request->user_id;
                                    $message->article_id =$request->article_id;
                                   $message->image=$request->image;
                                    $message->save();
                                    
           return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        //
    }
}
