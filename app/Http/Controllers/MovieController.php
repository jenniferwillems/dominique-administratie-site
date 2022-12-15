<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('pages.movies.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::genresTags(true);
        
        return view('pages.movies.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->save();

        $tagsToSync = collect($request->genres)->map(function($tag, $key) {
            if ((int) $tag) {
                return $tag;
            }
            else {
                $newTag = Tag::create([
                    'name' => $tag,
                    'category_id' => 3,
                ]);
                return $newTag->id;
            }
        });

        $movie->genres()->sync($tagsToSync);
        
        return redirect()
            ->route('movies.index')
            ->with('success', 'Film succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $tags = Tag::genresTags(true);
        
        return view('pages.movies.edit', [
            'movie' => $movie,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->save();

        $tagsToSync = collect($request->genres)->map(function($tag, $key) {
            if ((int) $tag) {
                return $tag;
            }
            else {
                $newTag = Tag::create([
                    'name' => $tag,
                    'category_id' => 3,
                ]);
                return $newTag->id;
            }
        });

        $movie->genres()->sync($tagsToSync);
        
        return redirect()
            ->route('movies.index')
            ->with('success', 'Film succesvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        $movie->genres()->detach();
        Movie::destroy($id);
        
        return redirect()
            ->route('movies.index');
    }
}
