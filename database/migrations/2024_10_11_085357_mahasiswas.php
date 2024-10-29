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
        //

        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nim', 20)->unique();
            $table->string('nama', 30);
            $table->string('email');
            $table->string('jurusan');
            $table->string("nomor_hp");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
