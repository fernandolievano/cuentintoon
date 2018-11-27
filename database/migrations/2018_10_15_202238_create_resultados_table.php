<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('resultados', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->integer('prueba_id')->unsigned();
      $table->integer('resultado');
      $table->timestamps();

      $table->foreign('prueba_id')
      ->references('id')
      ->on('pruebas')
      ->onDelete('cascade');

      $table->foreign('user_id')
      ->references('id')
      ->on('users')
      ->onDelete('cascade');


    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('resultados');
  }
}
