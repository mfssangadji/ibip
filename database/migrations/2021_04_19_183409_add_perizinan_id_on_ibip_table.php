<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerizinanIdOnIbipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ibip', function (Blueprint $table) {
            $table->bigInteger('perizinan_id')->unsigned()->index()->nullable();
            $table->foreign('perizinan_id')->references('id')->on('perizinan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
