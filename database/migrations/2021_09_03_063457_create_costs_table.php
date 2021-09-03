<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('from_trx_Name');
            $table->text('trx_Name');
            $table->text('bank_id');
            $table->text('bank_name');
            $table->text('acc_no');
            $table->text('user_id');
            $table->text('user_name');
            $table->text('amount');
            $table->text('status');
            $table->text('status_detail');
            $table->text('note');
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
        Schema::dropIfExists('costs');
    }
}
