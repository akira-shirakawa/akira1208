<?php

namespace App\Http\Controllers;

use App\Homework;
use Illuminate\Http\Request;
use Storage;
use App\User;
use App\Reply;


class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
          $message = Homework::all();
          

          $message2 = new HomeworkController;
       
      
        return view('admin.homework',['message'=>$message,'message2'=>$message2]);
    }
    
    public function show_statue($user_id,$article_id){
        
        
        $message = Reply::where('user_id',$user_id)->where('article_id',$article_id)->get();

        
        if(isset($message[0]->statue)){
            if($message[0]->statue ==1){
                return '合格';
            }else{
                return '再提出';
            }
        }else{
            return '未確認';
        }
    }
   public function return_statue($user_id,$article_id){
       $message = Reply::where('user_id',$user_id)->where('article_id',$article_id)->get()->first();
       return $message;
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
               $message->image=$image;
                $message->save();
                                  
           return back();
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
               $filename = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('public', $filename);
                $contents = Storage::get('public/'.$filename);
                $pa=Storage::disk('s3')->put($filename, $contents, 'public'); // Ｓ３にアップ
                $image= Storage::disk('s3')->url($filename);
                
                                   
              $message =  Homework::where('user_id',$request->user_id)->where('article_id',$request->article_id)->get()->first();
                $message->user_id =$request->user_id;
                $message->article_id =$request->article_id;
              $message->image=$image;
                $message->save();
                
                $message2 = Reply::where('user_id',$request->user_id)->where('article_id',$request->article_id)->get()->first();
                $message2->statue = 5;
                $message2->save();
           return back();
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
