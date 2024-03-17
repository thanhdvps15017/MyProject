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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('name', 11);
            $table->string('tel');
            $table->string('city');
            $table->string('district');
            $table->string('ward');
            $table->string('address');
            $table->string('note')->nullable();
            $table->string('payment');
            $table->integer('total');
            $table->timestamps();
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
