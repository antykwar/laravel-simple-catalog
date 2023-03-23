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
        Schema::create('images', static function (Blueprint $table) {
            $table->id();
            $table->string('original_name', 512);
            $table->string('original_extension', 6);
            $table->string('file_name', 512);
            $table->string('file_extension', 6);
            $table->string('small_thumb_name', 512)->nullable();
            $table->string('small_thumb_extension', 6)->nullable();
            $table->integer('entity_id');
            $table->string('entity_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
