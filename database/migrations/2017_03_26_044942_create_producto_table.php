<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crea tabla
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 45);
            $table->text('descripcion');
            $table->decimal('valor', 8, 2);
            $table->integer('categoria_id')->unsigned();
            $table->integer('estado')->default(Config::get('constants.estados.ON'))->comment('ON: 1; OFF: 0.');
            $table->timestamps();
        });

        Schema::table('producto', function (Blueprint $table) {

            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar tabla
        Scheme::dropIfExists('producto');
    }
}
