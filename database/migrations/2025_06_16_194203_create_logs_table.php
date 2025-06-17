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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('log_status_id');

            $table->date('started_at')->nullable();
            $table->date('finished_at')->nullable();
            $table->text('note')->nullable();
            $table->integer('score')->nullable();
            $table->string('platform')->nullable();
            $table->integer('spent_hours')->nullable();
            $table->boolean('rerun')->nullable();

            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('log_status_id')->references('id')->on('log_statuses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
