<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerTypesSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $player_type_skills = [
                   // Humans (player_type_id 1-4)
                   ['player_type_id' => 1, 'skill_id' => 1], // Block
                   ['player_type_id' => 1, 'skill_id' => 2], // Mighty Blow
                   ['player_type_id' => 2, 'skill_id' => 1], // Block
                   ['player_type_id' => 2, 'skill_id' => 6], // Fend
                   ['player_type_id' => 3, 'skill_id' => 4], // Pass
                   ['player_type_id' => 4, 'skill_id' => 5], // Dodge

                   // Orcs (player_type_id 5-8)
                   ['player_type_id' => 5, 'skill_id' => 1], // Block
                   ['player_type_id' => 6, 'skill_id' => 12], // Frenzy
                   ['player_type_id' => 7, 'skill_id' => 2], // Mighty Blow
                   ['player_type_id' => 8, 'skill_id' => 7], // Guard

                   // Dwarfs (player_type_id 9-12)
                   ['player_type_id' => 9, 'skill_id' => 1], // Block
                   ['player_type_id' => 10, 'skill_id' => 6], // Fend
                   ['player_type_id' => 11, 'skill_id' => 2], // Mighty Blow
                   ['player_type_id' => 12, 'skill_id' => 9], // Tackle

                   // Skaven (player_type_id 13-16)
                   ['player_type_id' => 13, 'skill_id' => 5], // Dodge
                   ['player_type_id' => 14, 'skill_id' => 11], // Claw
                   ['player_type_id' => 15, 'skill_id' => 12], // Frenzy
                   ['player_type_id' => 16, 'skill_id' => 8], // Sprint

                   // Elven Union (player_type_id 17-20)
                   ['player_type_id' => 17, 'skill_id' => 1], // Block
                   ['player_type_id' => 18, 'skill_id' => 4], // Pass
                   ['player_type_id' => 19, 'skill_id' => 8], // Sprint
                   ['player_type_id' => 20, 'skill_id' => 5], // Dodge

                   // Lizardmen (player_type_id 21-24)
                   ['player_type_id' => 21, 'skill_id' => 12], // Frenzy
                   ['player_type_id' => 22, 'skill_id' => 11], // Claw
                   ['player_type_id' => 23, 'skill_id' => 13], // Regeneration
                   ['player_type_id' => 24, 'skill_id' => 9],  // Tackle

                   // Chaos Chosen (player_type_id 25-28)
                   ['player_type_id' => 25, 'skill_id' => 1], // Block
                   ['player_type_id' => 26, 'skill_id' => 2], // Mighty Blow
                   ['player_type_id' => 27, 'skill_id' => 12], // Frenzy
                   ['player_type_id' => 28, 'skill_id' => 14], // Bonehead

                   // Khemri (player_type_id 29-32)
                   ['player_type_id' => 29, 'skill_id' => 1], // Block
                   ['player_type_id' => 30, 'skill_id' => 13], // Regeneration
                   ['player_type_id' => 31, 'skill_id' => 14], // Bonehead
                   ['player_type_id' => 32, 'skill_id' => 15], // Hypnotic Gaze

                   // Necromantic (player_type_id 33-36)
                   ['player_type_id' => 33, 'skill_id' => 16], // Stunty
                   ['player_type_id' => 34, 'skill_id' => 12], // Frenzy
                   ['player_type_id' => 35, 'skill_id' => 13], // Regeneration
                   ['player_type_id' => 36, 'skill_id' => 18], // Decay

                   // Norse (player_type_id 37-40)
                   ['player_type_id' => 37, 'skill_id' => 1], // Block
                   ['player_type_id' => 38, 'skill_id' => 4], // Pass
                   ['player_type_id' => 39, 'skill_id' => 8], // Sprint
                   ['player_type_id' => 40, 'skill_id' => 12], // Frenzy
               ];

        DB::table('player_type_skills')->insert($player_type_skills);
    }
}
