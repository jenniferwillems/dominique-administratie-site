<?php

namespace App\View\Components;

use App\Models\Book;
use App\Models\Game;
use App\Models\Movie;
use Illuminate\View\Component;

class Stats extends Component
{
    /**
     * @var int Count of total books in the database.
     */
    public $booksCount;

    /**
     * @var int Count of total games in the database.
     */
    public $gamesCount;

    /**
     * @var int Count of total movies in the database.
     */
    public $moviesCount;

    /**
     * @var int Count of total books, games and movies in the database.
     */
    public $totalCount;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->booksCount = Book::all()->count();
        $this->gamesCount = Game::all()->count();
        $this->moviesCount = Movie::all()->count();
        $this->totalCount = $this->booksCount + $this->gamesCount + $this->moviesCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stats');
    }
}
