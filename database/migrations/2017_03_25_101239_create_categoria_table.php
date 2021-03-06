<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crea tabla categoria
        Schema::create('categoria', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nombre', 45);
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
        // Eliminar tabla categoria
        Scheme::dropIfExists('categoria');
    }
}
