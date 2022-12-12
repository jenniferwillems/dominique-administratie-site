<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Tag;
use Livewire\WithPagination;
use Livewire\Component;

class BookTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedTag = [];

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
        return view('livewire.book-table', [
            'books' => Book::where('title', 'like', '%' . $this->search . '%')
                ->when($this->selectedTag, function($query) {
                    return $query->where('series_id', $this->selectedTag['id']);
                })->paginate(20),
        ]);
    }
}
