<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('activities_recommendations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('prompt_id')->constrained('prompt_messages')->onDelete('cascade');
        $table->string('day');
        $table->text('activity');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_recommendations');
    }
};
