<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('trx_type');
            $table->text('user_id');
            $table->text('bank_id');
            $table->text('website_id');
            $table->text('amount');
            $table->text('old_web_coin');
            $table->text('new_web_coin');
            $table->text('old_bank_balance');
            $table->text('new_bank_balance');
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
        Schema::dropIfExists('transactions');
    }
}
