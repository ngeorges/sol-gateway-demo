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
        Schema::create('pumps', function (Blueprint $table) {
            $table->id();
            $table->string('pump_status')->default(0);
            $table->string('product_id')->default(0);
            $table->string('amount')->default(0);
            $table->string('volume')->default(0);
            $table->boolean('complete')->default(false);
            $table->timestamps();
        });

        // Auto-create the first record
        DB::table('pumps')->insert([
            'pump_status' => 0,
            'product_id' => 0,
            'amount' => 0,
            'volume' => 0,
            'complete' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pumps');
    }
};
