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
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); // Nama menu
            $table->string('route')->nullable(); // Route menu
            $table->string('icon')->nullable(); // Ikon menu
            $table->foreignUuid('parent_id')->nullable()->references('id')->on('menus')->onDelete('set null'); // Parent menu
            $table->integer('order')->default(0); // Urutan menu
            $table->timestamps();
        });

        Schema::create('role_menu', function (Blueprint $table) {
            $table->foreignUuid('menu_id')->constrained('menus')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->primary(['menu_id', 'role_id']); // Kombinasi primary key
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_menu');
        Schema::dropIfExists('menus');
    }
};
