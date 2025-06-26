<?php

namespace App\Livewire;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Team;


#[Layout('layouts.app')]
class NewPlayer extends Component
{
    public $count = 1;
    public Team $team;
    public bool $showForm = false;
    public array $availableSlots = [];
    public bool $isEdit = true;
    public $playerTypes;
    // Aquí Laravel hace el "route model binding" automático y te pasa el Team
    public function mount(Team $team)
    {
        $this->team = $team;
        $this->playerTypes = $this->team->roster->playerTypes;

        $existingCounts = $this->team->players()
            ->selectRaw('player_type_id, COUNT(*) as total')
            ->groupBy('player_type_id')
            ->pluck('total', 'player_type_id');
        // Calculamos disponibilidad

        foreach ($this->playerTypes as $type) {
            $used = $existingCounts[$type->id] ?? 0;
            $this->availableSlots[$type->id] = $type->max_per_team - $used;
        }
        $this->isEdit = true;

    }
    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function render()
    {
        return view('livewire.newplayer');

    }
}