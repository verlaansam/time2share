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
        Schema::create('product_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('userId');
            $table->string('name');
            $table->string('location');
            $table->string('catagorie');
            $table->string('image');
            $table->date('availableFrom');
            $table->date('availableTill');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
