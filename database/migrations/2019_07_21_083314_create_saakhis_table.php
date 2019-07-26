<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaakhisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saakhis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('publisher');
            $table->string('saakhi');

            $table->string('issue');
            $table->string('volume');
            $table->date('date');
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
        Schema::dropIfExists('saakhis');
    }
}
