<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Tag;
use Livewire\WithPagination;
use Livewire\Component;

class GameTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedTag;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedTag()
    {
        dd('updated');
        $this->resetPage();
    }

    public function addFilter($tag = null)
    {
        $this->selectedTag = $tag;
    }

    public function render()
    {
        return view('livewire.game-table', [
            'games' => Game::where('title', 'like', '%' . $this->search . '%')
                ->when($this->selectedTag, function ($query) {
                    return $query->whereHas('consoles', function ($subquery) {
                        $subquery->where('name', $this->selectedTag['name']);
                    });
                })->paginate(20),
        ]);
    }
}
