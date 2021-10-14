<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("articulo_id");
            $table->foreign("articulo_id")
                ->references("id")
                ->on("articulos")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->unsignedBigInteger("modelo_id");
            $table->foreign("modelo_id")
                ->references("id")
                ->on("modelos")
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::dropIfExists('productos');
    }
}
