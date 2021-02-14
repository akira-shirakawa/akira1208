<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Homework;

class ReplyController extends Controller
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
    {   if($request->statue == 1){
        
        $user = User::find($request->user_id);
        $user->point+=10;
        $user->save();
    }
        $message =$request->all();
        Reply::create($message);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $message = Homework::where('user_id',$id)->get();

        $message2 = new ReplyController;
        
        return view('show_homework',['message'=>$message,'message2'=>$message2]);
        
    }
    //deal with the error that trying to get propaty title of none object
    public function get_date($date){
        if(!empty($data)){
            return $data->title;
        }else{
            return ; 
        }
    }
    
    public function get_id($data){
        if(!empty($data)){
            return $data->id;
        }else{
            return 0; 
        }
    }
    public function get_reply($user_id,$article_id){
        $message3 = Reply::where('user_id',$user_id)->where('article_id',$article_id)->get()->first();
      
  
   return $message3->comment ?? 'まだ返信はありません';
     
       
       

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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {  
    
        $message = Reply::find($request->reply_id);
        $message->statue = $request->statue;
        $message->comment = $request->comment;
        $message->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
