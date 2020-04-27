<?php

namespace App\Http\Controllers;

use App\Message;
use App\Movie;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function getMessages(){
       $messages = Message::all();

       return view('messages')->with('messages',$messages);
     }

     public function getAdd(){
       return view('movies_management.add_movie');
     }

     public function getDelete(){
       $movies = Movie::all();

       return view('movies_management.delete_movie')->with('movies',$movies);
     }

     public function getUpdateTable(){
       $movies = Movie::all();

       return view('movies_management.update_table')->with('movies',$movies);
     }

     public function getUpdate(Request $request){
       $this->validate($request,[
         'select' =>'required'
       ]);
       $id = $request->input('select');
       $movie = Movie::findOrFail($id);

       return view('movies_management.update_movie')->with('movie',$movie);
     }

     public function getEdit(){
       return view('edit');
     }
}
