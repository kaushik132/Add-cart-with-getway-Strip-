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
        Schema::create('productbills', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
        $table->decimal('total', 10, 2); // Adjust precision and scale as needed
        $table->integer('quantity');
        $table->string('user_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productbills');
    }
};
