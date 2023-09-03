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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('full_name');
            $table->string('role_code')->index();
            $table->string('status_code');
            $table->string('class_code')->default('1A')->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_code')->references('role_code')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('class_code')->references('class_code')->on('learning_classes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
