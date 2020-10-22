<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('type',['R','D','T']);
            $table->enum('origem',['A1','A2','P1','P2','P3','C1']);
            $table->text('descricao');
            $table->double('valor',10,2);
            $table->double('total_before',10,2);
            $table->double('total_after',10,2);
            $table->integer('user_id_transaction')->nullable();
            $table->date('date');
            $table->enum('validade',['S','N']);
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
        Schema::dropIfExists('despesas');
    }
}
