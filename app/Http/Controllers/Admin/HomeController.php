<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Homework;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    public function create(){
        $message =new Article;
    
        return view('admin.make',['message'=>$message]);
    }
    public function homework_index(){
        
    }
}
