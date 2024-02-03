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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('cantidad')->unsigned()->default(0);
            $table->decimal('precio_actual',12)->default(0);
            $table->decimal('precio_anterior',12)->default(0);
            $table->integer('porcentaje_descuento')->unsigned()->default(0);
            $table->text('descripcion_corta')->nullable();
            $table->text('descripcion_larga')->nullable();
            $table->text('especificaciones')->nullable();
            $table->text('datos_de_interes')->nullable();
            $table->unsignedBigInteger('visitas')->default(0);
            $table->unsignedBigInteger('ventas')->default(0);
            $table->string('estado')->nullable();;
            $table->char('activo'); 
            $table->char('sliderprincipal', 2);
            $table->string('imgppal')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->timestamps();

            $table  ->foreign('category_id')
                    ->references('id')
                    ->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
