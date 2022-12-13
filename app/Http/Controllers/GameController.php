<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('pages.games.index', [
            'games' => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::consolesTags(true);
        
        return view('pages.games.create', [
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
        $game = new Game();
        $game->title = $request->title;
        $game->save();

        $tagsToSync = collect($request->consoles)->map(function($tag, $key) {
            if ((int) $tag) {
                return $tag;
            }
            else {
                $newTag = Tag::create([
                    'name' => $tag,
                    'category_id' => 2,
                ]);
                return $newTag->id;
            }
        });

        $game->consoles()->sync($tagsToSync);
        
        return redirect()
            ->route('games.index')
            ->with('success', 'Game succesvol aangemaakt');
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
        $game = Game::findOrFail($id);
        $tags = Tag::consolesTags(true);
        
        return view('pages.games.edit', [
            'game' => $game,
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
        $game = Game::findOrFail($id);
        $game->title = $request->title;
        $game->save();

        $tagsToSync = collect($request->consoles)->map(function($tag, $key) {
            if ((int) $tag) {
                return $tag;
            }
            else {
                $newTag = Tag::create([
                    'name' => $tag,
                    'category_id' => 2,
                ]);
                return $newTag->id;
            }
        });

        $game->consoles()->sync($tagsToSync);

        return redirect()
            ->route('games.index')
            ->with('success', 'Game succesvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        
        $game->consoles()->detach();
        Game::destroy($id);
        
        return redirect()
            ->route('games.index');
    }
}
