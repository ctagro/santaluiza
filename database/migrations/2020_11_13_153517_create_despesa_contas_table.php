<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespesaContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesa_contas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('type',['R','D','T']);
            $table->unsignedBigInteger('origem_id');
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
        Schema::dropIfExists('despesa_contas');
    }
}
