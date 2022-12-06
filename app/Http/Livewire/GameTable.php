<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\WithPagination;
use Livewire\Component;

class GameTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.game-table', [
            'games' => Game::where('title', 'like', '%' . $this->search . '%')->paginate(20),
        ]);
    }
}
