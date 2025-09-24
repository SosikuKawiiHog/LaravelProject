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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->date('release_date');
            $table->binary('cover_image')->nullable();
            $table->foreignId('developer_id')->constrained('developers');
            $table->unsignedInteger('meta_score')->nullable();
            $table->decimal('user_score',3,1)->nullable();
            $table->timestamps();

            $table->index('release_date');
            $table->index('meta_score');
            $table->index('user_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
