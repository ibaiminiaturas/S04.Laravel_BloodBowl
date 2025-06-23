<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function playerTypes()
    {
        return $this->belongsToMany(
            PlayerType::class,
            'player_type_skill',
            'skill_id',
            'player_type_id'
        );
    }
}
