<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia', 3);
            $table->time('inicio');
            $table->time('inicio_almoco')->nullable();
            $table->time('fim_almoco')->nullable();
            $table->time('fim');

            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')
                        ->references('id')->on('funcionarios')
                            ->onDelete('cascade');

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
        Schema::dropIfExists('horarios');
    }
}
