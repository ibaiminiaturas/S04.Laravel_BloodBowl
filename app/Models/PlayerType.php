<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerType extends Model
{
    public $timestamps = false;

    protected $fillable = [
         'name',
         'roster_id',
         'max_per_team',
         'movement',
         'strength',
         'agility',
         'passing',
         'armor',
         'cost',
     ];

    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'player_type_skills',
            'player_type_id',
            'skill_id'
        );
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
