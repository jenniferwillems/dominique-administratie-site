<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('pages.books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::seriesTags(true);
        
        return view('pages.books.create', [
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
        $book = new Book();
        $book->title = $request->title;
        
        if ((int) $request->series){
            $book->series_id = $request->series;
        }
        else {
            $newTag = new Tag();
            $newTag->name = $request->series;
            $newTag->category_id = 1;
            $newTag->save();
            
            $book->series_id = $newTag->id;
        }
        
        $book->code = $request->code;
        $book->save();

        return redirect()
            ->route('books.index')
            ->with('success', 'Boek succesvol aangemaakt');
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
        $book = Book::findOrFail($id);
        $tags = Tag::seriesTags(true);
        
        return view('pages.books.edit', [
            'book' => $book,
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
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        
        if ((int) $request->series){
            $book->series_id = $request->series;
        }
        else {
            $newTag = new Tag();
            $newTag->name = $request->series;
            $newTag->category_id = 1;
            $newTag->save();

            $book->series_id = $newTag->id;
        }
        
        $book->code = $request->code;

        $book->save();

        return redirect()
            ->route('books.index')
            ->with('success', 'Boek succesvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()
            ->route('books.index');
    }
}
