<?php

namespace App\View\Components;

use App\Models\Book;
use App\Models\Game;
use App\Models\Movie;
use Illuminate\View\Component;

class Stats extends Component
{
    public $booksCount;
    public $gamesCount;
    public $moviesCount;
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
