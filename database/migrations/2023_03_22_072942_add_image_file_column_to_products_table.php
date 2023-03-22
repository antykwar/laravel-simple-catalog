<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'image_file'))
        {
            Schema::table('products', static function (Blueprint $table)
            {
                $table->string('image_file', 512)->nullable();
                $table->string('image_name', 512)->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'image_file'))
        {
            Schema::table('products', static function (Blueprint $table)
            {
                $table->dropColumn('image_file');
                $table->dropColumn('image_name');
            });
        }

    }
};
