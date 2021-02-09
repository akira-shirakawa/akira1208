<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Log;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Reply;
use App\Notification;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $carbon = Carbon::parse('now');
        $day=$carbon->subDays(1)->timestamp; 
        $month = $carbon->subMonths(1)->timestamp;
       $day= date("Y-m-d H:i:s",$day);
       $month = date("Y-m-d H:i:s",$month); 
        
        $notification = Notification::all();
        $notification = Notification::do_notification_public($notification);
        $record= Log::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$day)->groupBy('user_id')->limit(5)->get();
        $record2 = Reply::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$day)->groupBy('user_id')->limit(5)->get();
        $month_record= Log::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$month)->groupBy('user_id')->limit(5)->get();
        $month_record2 =Reply::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$month)->groupBy('user_id')->limit(5)->get();
        
        Log::tentimes($record2);
        Log::tentimes($month_record2);
        $dayly=Log::marge($record,$record2);
        $mothly=Log::marge($month_record,$month_record2);
        $message = User::orderBy('point','dese')->limit(5)->get();
        $user = new LogController;
       return view('home',['message'=>$message,'day'=>$dayly,'month'=>$mothly,'user'=>$user,'notification'=>$notification]);
        
    }
    
    public function get_user($id){
        return User::find($id);
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
    { if(!empty(Auth::id())){
     if(empty(Log::where('user_id',Auth::id())->where('question_id',$request->question_id)->get()->first())){
         
          $message=new Log;
          $message->user_id=Auth::id();
          $message->question_id=$request->question_id;
          $message->save();
          $message2 = User::find(Auth::id());
          $message2->point+=1;
          $message2->save();
          
     }   
    }
      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
