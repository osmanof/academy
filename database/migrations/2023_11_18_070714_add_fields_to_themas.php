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
        Schema::table('themas', function (Blueprint $table) {
            $table->string('title');
            $table->string('deadline_date');
            $table->string('deadline_time');
            $table->smallInteger('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('themas', function (Blueprint $table) {
            //
        });
    }
};
