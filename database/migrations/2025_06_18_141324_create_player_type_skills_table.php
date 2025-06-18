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
        Schema::create('player_type_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('player_type_id');
            $table->unsignedBigInteger('skill_id');
            $table->primary(['player_type_id', 'skill_id']);
            $table->foreign('player_type_id')->references('id')->on('player_types')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_type_skill');
    }
};
