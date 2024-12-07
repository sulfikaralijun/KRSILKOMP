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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->text('topik');
            $table->tinyInteger('semester');
            $table->enum('status', ['draft', 'setuju', 'revisi'])->default('draft');
            $table->text('keterangan')->nullable();
            $table->foreignUlid('dosen_id')->constrained('users')->nullable();
            $table->foreignUlid('krs_id')->constrained('krs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
