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
        Schema::create('krs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUlid('mahasiswa_id', 55)->constrained('users');
            $table->foreignUlid('kajur_id', 55)->nullable()->constrained('users');
            $table->foreignUlid('dosen_id', 55)->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
