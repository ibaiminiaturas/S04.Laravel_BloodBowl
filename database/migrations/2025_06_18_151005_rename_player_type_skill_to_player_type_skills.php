<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('player_type_skill', 'player_type_skills');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('player_type_skills', 'player_type_skill');
    }
};
