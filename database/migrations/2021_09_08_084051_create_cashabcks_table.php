<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashabcksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashabcks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('trx_number');
            $table->text('user_id');
            $table->text('amount');
            $table->text('bank_id');
            $table->text('bank_name');
            $table->text('acc_no');
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
        Schema::dropIfExists('cashabcks');
    }
}
