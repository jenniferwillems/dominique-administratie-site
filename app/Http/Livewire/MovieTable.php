<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\WithPagination;
use Livewire\Component;

class MovieTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedTag;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addFilter($tag = null)
    {
        $this->selectedTag = $tag;
    }

    public function render()
    {
        return view('livewire.movie-table', [
            'movies' => Movie::where('title', 'like', '%' . $this->search . '%')
                ->when($this->selectedTag, function ($query) {
                    return $query->whereHas('genres', function ($subquery) {
                        $subquery->where('name', $this->selectedTag['name']);
                    });
                })->paginate(20),
        ]);
    }
}
