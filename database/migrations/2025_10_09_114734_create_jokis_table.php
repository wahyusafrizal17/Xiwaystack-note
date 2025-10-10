<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jokis', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('photo_path')->nullable();
            $table->string('domain')->nullable();
            $table->unsignedBigInteger('price');
            $table->string('customer_name');
            $table->string('phone');
            $table->unsignedBigInteger('dp_amount');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jokis');
    }
};
