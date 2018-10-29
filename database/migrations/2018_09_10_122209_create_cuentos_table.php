<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('cover')->nullable();
            $table->integer('user_id');
            $table->string('nivel');
            $table->string('estado')->nullable();
            $table->string('descripcion');
            //table->string('valoracion');
            $table->string('autor');
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
        Schema::dropIfExists('cuentos');
    }
}
