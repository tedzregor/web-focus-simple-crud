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
        Schema::create('tb_student', function (Blueprint $table) {
            $table->id();
            $table->String("first_name")->nullable();
            $table->String("last_name")->nullable();
            $table->String("middle_name")->nullable();
            $table->integer("age")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_student');
    }
};
