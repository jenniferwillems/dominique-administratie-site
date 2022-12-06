<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\WithPagination;
use Livewire\Component;

class BookTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.book-table', [
            'books' => Book::where('title', 'like', '%' . $this->search . '%')->paginate(20),
        ]);
    }
}
