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
        Schema::table('tasks', function (Blueprint $table) {
            $table->mediumText('task_text')->change();
            $table->mediumText('stdin')->change()->nullable();
            $table->mediumText('stdout')->change()->nullable();
            $table->mediumText('samples')->change()->nullable();
            $table->boolean('autocheck');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
