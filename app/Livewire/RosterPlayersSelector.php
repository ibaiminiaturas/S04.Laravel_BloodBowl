<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Roster;

class RosterPlayersSelector extends Component
{
    public $roster;
    public $playerTypes = [];

    public function mount()
    {
        $this->roster = '';
        $this->playerTypes = [];
    }

    public function rosterChanged($rosterId)
    {
        $roster = Roster::find($rosterId);
        $this->playerTypes = $roster ? $roster->playerTypes : [];
    }

    public function render()
    {
        return view('livewire.roster-players-selector', [
            'rosters' => Roster::all(),
        ]);
    }
}