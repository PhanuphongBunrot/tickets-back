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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->text('description'); 
            $table->string('email'); 
            $table->enum('priority', ['High', 'Medium', 'Low']); 
            $table->string('organization'); 
            $table->string('vessel'); 
            $table->string('service_Line'); 
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
        Schema::dropIfExists('tickets'); 
    }
};
