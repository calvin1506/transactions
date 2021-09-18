<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('trx_type');
            $table->text('trx_detail');
            $table->text('trx_source');
            $table->text('old_amount');
            $table->text('old_bonus');
            $table->text('new_amount');
            $table->text('new_bonus');
            $table->text('submitter_id');
            $table->text('submitter_name');
            $table->text('corrector_id');
            $table->text('corrector_name');
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
        Schema::dropIfExists('corrections');
    }
}
