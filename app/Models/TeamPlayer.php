<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    protected $fillable = [
        'player_type_id',
        'team_id',
        'name',
        'jersey_number',
        'experience',
    ];

    public function playerType()
    {
        return $this->belongsTo(PlayerType::class);
    }

    public function Team()
    {
        return $this->belongsTo(Team::class);
    }

}
