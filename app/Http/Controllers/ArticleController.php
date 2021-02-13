<?php

namespace App\Http\Controllers;

use App\Article;
use App\Reply;
use App\Homework;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $message = Article::all();
       return view('admin.show_article',['message'=>$message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $message = $request->all();
       Article::create($message);
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $message = Article::find($id);
     $message2 = new ArticleController;
     $message3 =  Post::where('user_id',Auth::id())->where('article_id',$id)->get()->first();
    $message3 =  !empty($message3)? $message3->memo : null;  
     return view('show_article',['message'=>$message,'message2'=>$message2,'message3'=>$message3]);
     
    }
    public function distinct_homework($user_id,$article_id){
         $message = Reply::where('user_id',$user_id)->where('article_id',$article_id)->get()->first();
         $message2 = Homework::where('user_id',$user_id)->where('article_id',$article_id)->get()->first();
        
      if(empty($message2) ){
          return '未提出';
      }
     if(empty($message) || $message->statue == 5){
         return '提出済み';
     }
      
   if($message->statue == 2){
       return '再提出';
   }else{
       return '合格';
   }
         
    }
    public function show_index($id){
       
        $message = Article::where("subject","$id")->get();
        $message2 =new Article;
        $message3 = new HomeworkController;  
        $tmp =[];
        foreach($message as $key){
            $tmp2=[];
         $tmp2['category'] =$key->category;
         $tmp2['title']  =$key->title;
         $tmp2['content'] = $key->content;
         $tmp2['id'] = $key->id;
         $tmp[] =$tmp2;
        }
        $message = $message2->group_by($tmp,'category');
        return view('show_index',['message'=>$message,'message3'=>$message3]);
        
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $message = $request->id; 
      
       Article::destroy($message);
        return back();
        
    }
}
