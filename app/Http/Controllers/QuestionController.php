<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 
use App\Question;
use Illuminate\Http\Request;
use Log;
use App\User;
use Auth;

class QuestionController extends Controller
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
        return view('admin.question');
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
 
        
    //  public function store_csv(Request $request){
    //     $path=$request->file('csv')->getPathname();  
    //   $lines = file("$path");
    //   $count =0;
    //     foreach($lines as $key){
    //         $date = trim($key);
    //         $date = explode(',',$date);
    //         $message = new Question;
    //         $message->question=$date[0];
    //         $message->image=$date[1] ?: null;
    //         $message->option1=$date[2];
    //         $message->option2 =$date[3] ?: Question::auto_fill($lines,$count);
    //         $message->option3=$date[4] ?: Question::auto_fill($lines,$count);
    //         $message->option4=$date[5] ?: Question::auto_fill($lines,$count);
    //         $message->category=$date[6];
    //         $message->title=$date[7];
    //         $message->audio=$date[8] ?? null;
    //         $message->explanation=$date[9] ?? null;
    //         $message->save();
    //         $count++;
            
    //     }
    //     return back();

    //  }   
     public function store_csv(Request $request){
         $path=$request->file('csv')->getPathname();  
       $lines = file("$path");
       $count =0;
       foreach($lines as $key){
           $date = trim($key); 
           $data = explode(',',$date);  
           Question::updateOrCreate(
        ['question'=>$data[0]],
        ['image'=>$data[1],
        'option1'=>$data[2], 
        'option2'=>$data[3] ?: Question::auto_fill($lines,$count),
        'option3'=>$data[4] ?: Question::auto_fill($lines,$count),   
        'option4'=>$data[5] ?: Question::auto_fill($lines,$count), 
        'category'=>$data[6],
        'title'=>$data[7]
        ]);
        $count++;
       }
       return back();
     }
        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Question::where('title',$id)->get();
       
         
        $array=[];
        foreach($message as $key){
            $item = [];
            $item['question']= $key->question;
            $item['id'] =$key->id;
            $item['category'] = $key->category; 
            $item['answer'] = [$key->option1,$key->option2,$key->option3,$key->option4];
            $array[]= $item;
        }
   //   $array = (json_encode($array));
      

          
        return view('question',['array'=>$array,'message'=>$message]); 
    }
    
    public function show_index($id){
        if(!empty(Auth::id())){
        $record2 = User::find(Auth::id())->questions()->where('category',$id)->get();   
        $message = Question::where('category',$id)->get();
        $message = User::get_title($message);
        $record2 = User::get_title($record2);
        $result = User::get_rate($message,$record2);
        $message2 = Question::return_sub($id);
        return view('show_question',['message'=>$result,'message2'=>$message2]);  
        }
        $message = Question::where('category',$id)->get(); 
        $message = User::get_title($message); 
        $message2 = Question::return_sub($id);
       
        return view("show_question",['message'=>$message,'message2'=>$message2]); 
    }
    
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
