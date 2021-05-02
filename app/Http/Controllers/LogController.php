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
use Storage;



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
        $going_array=[];
        $notification = Notification::all();
        $notification = Notification::do_notification_public($notification);
        $record= Log::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$day)->groupBy('user_id')->limit(5)->get();
        $record2 = Reply::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$day)->groupBy('user_id')->limit(5)->get();
        $month_record= Log::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$month)->groupBy('user_id')->limit(5)->get();
        $month_record2 =Reply::select(DB::raw('count(*) as point,user_id'))->where('created_at','>',$month)->groupBy('user_id')->limit(5)->get();
        $going = Log::where('created_at','>',$day)->distinct()->select('user_id')->get(['user_id']);
        foreach($going as $key){
            $tmp = [];
            $tmp[]= $key->user_id;
            $tmp[] = 1;
            $tmp[] = 0;
            $going_array[] = $tmp;
            
        }
        // dd($going_array); 
      // dd(Carbon::now()->subDays(1)->format('Y-m-d h:i:s'));
        $count=1;
         
        $flag=1;
        while($flag ==1){
             $flag=0;
        foreach($going_array as &$key){
           
            if($key[2] == 0){
            $tmp = Log::where('user_id',$key[0])->where('created_at','>',Carbon::now()->subDays($count+1)->format('Y-m-d h:i:s'))->where('created_at','<', Carbon::now()->subDays($count)->format('Y-m-d h:i:s'))->get();
         
            if(!empty($tmp[0]->user_id)){ 
                $key[1]=$count+1;
                $flag=1;
            }else{
                $key[2] = 1;
            }
        }
        }
        $count++;
        unset($key);
        }
        $tmp_array=[];
        foreach($going_array as $key){
           $tmp_array[] = $key[1]; 
        }
         array_multisort($tmp_array, SORT_DESC, $going_array);
   
      
        Log::tentimes($record2);
        Log::tentimes($month_record2);
        $dayly=Log::marge($record,$record2);
        $mothly=Log::marge($month_record,$month_record2);
        $message = User::orderBy('point','dese')->limit(5)->get();
        $user = new LogController;
       return view('home',['message'=>$message,'day'=>$dayly,'month'=>$going_array,'user'=>$user,'notification'=>$notification]);
        
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
     public function edit(Request $request){
            if(!empty($request->file('image'))){ 
              $filename = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('public', $filename);
                $contents = Storage::get('public/'.$filename);
                $pa=Storage::disk('s3')->put($filename, $contents, 'public'); // Ｓ３にアップ
                $image= Storage::disk('s3')->url($filename);
               
               $message = User::find(Auth::id());
               $message->name = $request->name;
               $message->high_school_name = $request->high_school_name;
               $message->college = $request->college;                 
               $message->image=$image;
               $message->save();
               return back();
            }
               $message = User::find(Auth::id());
               $message->name = $request->name;
               $message->high_school_name = $request->high_school_name;
               $message->college = $request->college; 
              
               $message->save();
                                   
           return back();
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
