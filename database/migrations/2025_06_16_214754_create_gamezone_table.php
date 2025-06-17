<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gamezone', function (Blueprint $table) {
            $table->id();
            $table->boolean('trigger')->default(false);
            $table->timestamps();
        });
        // Auto-create the first record
        DB::table('gamezone')->insert([
            'trigger' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamezone');
    }

    
};
