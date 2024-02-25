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
        //add school id in users table
        Schema::table('users', function (Blueprint $table){
            $table->integer('school_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // drop column school id
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('school_id');
        });
    }
};