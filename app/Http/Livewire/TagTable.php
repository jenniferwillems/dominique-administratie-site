<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\WithPagination;
use Livewire\Component;

class TagTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedTag = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addFilter($tagCategory = null)
    {
        $this->selectedTag = $tagCategory;
    }

    public function render()
    {
        return view('livewire.tag-table', [
            'tags' => Tag::where('name', 'like', '%' . $this->search . '%')
                ->when($this->selectedTag, function($query) {
                    return $query->where('category_id', $this->selectedTag['id']);
                })->paginate(20),
        ]);
    }
}
