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
        Schema::create('forums', function (Blueprint $table) {
            $table->id('forum_id');
            $table->string('title');
            $table->string('forum_description');
            $table->string('forum_image');
            $table->string('class_code')->index();
            $table->timestamps();

            $table->foreign('class_code')->references('class_code')->on('learning_classes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
