<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
     return view('show_article',['message'=>$message]);
     
     
    }
    public function show_index($id){
       
        $message = Article::where("subject","$id")->get();
        $message2 =new Article;
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
        return view('show_index',['message'=>$message]);
        
        
       
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
    public function destroy(Article $article)
    {
        //
    }
}
