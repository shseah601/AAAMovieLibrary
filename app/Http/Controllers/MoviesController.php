<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function add(Request $request){
      $this->validate($request,[
        'title' =>'required',
        'genre' =>'required',
        'synopsis' =>'required',
        'image' => 'mimes:jpeg'
      ]);

      //return new Movie
      $movie = new Movie;
      $movie->title = $request->input('title');
      $movie->genre = $request->input('genre');
      $movie->year = $request->input('year');
      $movie->synopsis = $request->input('synopsis');

      //save movie
      $movie->save();

      //image format

      //save image
      $imageName = $movie->id.'.'.$request->file('image')->getClientOriginalExtension();

      $request->file('image')->move(base_path().'/public/images/',$imageName);


      return redirect('/add')->with('success','Movie added');
    }
    public function update(Request $request){
      $this->validate($request,[
        'image' => 'mimes:jpeg'
      ]);

      $movie = Movie::find($request->input('id'));

      if($request->input('title') != "")
      {
      $movie->title = $request->input('title');
      }
      if($request->input('genre') != "")
      {
        $movie->genre = $request->input('genre');
      }
      if($request->input('year') != "")
      {
        $movie->year = $request->input('year');
      }
      if($request->input('synopsis') != "")
      {
        $movie->synopsis = $request->input('synopsis');
      }

      //save movie
      $movie->save();

      //save image
      if(!empty($request->file('image'))){
      $imageName = $movie->id.'.'.$request->file('image')->getClientOriginalExtension();
      $request->file('image')->move(base_path().'/public/images/', $imageName);
      }

      return redirect('/updatetable')->with('success','Movie updated');
    }

    public function delete(Request $request){
      $this->validate($request,[
        'select' =>'required'
      ]);
      $id = $request->input('select');
      Movie::where('id', $id)->delete();

      $image_path = public_path().'/images/'.$id.'.jpg';
      unlink($image_path);

      return redirect('/delete')->with('success','Movie deleted');
    }

    public function getMovies(Request $request){
      $movies = Movie::all();

      return view('movies')->with('movies',$movies);
    }

    public function getMovie(Request $request){
      $movie = Movie::find($request->input('movieId'));

        return view('movieDetails')->with('movie',$movie);
    }

    public function search(Request $request){
      $this->validate($request,[
        'select' =>'required'
      ]);

      $searchby = $request->input('select');
      $keyword = $request->input('search');

      if($searchby == '1')
      {
        $searchMovies = Movie::where('title','LIKE','%'.$keyword.'%')->get();
      }
      else if($searchby =='2')
      {
        $searchMovies = Movie::where('genre','LIKE','%'.$keyword.'%')->get();
      }
      else {
        $searchMovies = Movie::where('year','LIKE','%'.$keyword.'%')->get();
      }

      return view('/browse')->with('searchMovies',$searchMovies);
    }

    public function searchTitle(Request $request){
      $searchby = $request->input('select');
      $keyword = $request->input('titleSearch');

      $searchMovies = Movie::where('title','LIKE','%'.$keyword.'%')->get();

      return view('/browse')->with('searchMovies',$searchMovies);
    }


}
