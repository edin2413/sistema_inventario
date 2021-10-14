<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("producto_id");
            $table->foreign("producto_id")
                ->references("id")
                ->on("productos")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->unsignedBigInteger("articulo_id");
            $table->unsignedBigInteger("modelo_id");
            $table->string("descripcion");
            $table->decimal("precio_compra");
            $table->decimal("precio_venta");
            $table->integer("cantidad_base");
            $table->integer("existencia_agregar");
            $table->integer("existencia_actual");
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
        Schema::dropIfExists('historico_productos');
    }
}
