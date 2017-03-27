<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_portal_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('usuario_producto', function (Blueprint $table) {

            $table->foreign('usuario_portal_id')->references('id')->on('usuario_portal');
            $table->foreign('producto_id')->references('id')->on('producto');
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
        Scheme::dropIfExists('usuario_producto');
    }
}
