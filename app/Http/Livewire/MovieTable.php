<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\WithPagination;
use Livewire\Component;

class MovieTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.movie-table', [
            'movies' => Movie::where('title', 'like', '%' . $this->search . '%')->paginate(20),
        ]);
    }
}
