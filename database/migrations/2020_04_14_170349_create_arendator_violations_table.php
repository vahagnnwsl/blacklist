<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArendatorViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arendator_violations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arendator_id');
            $table->foreign('arendator_id')->references('id')->on('arendators');
            $table->text('description');
            $table->date('date');
            $table->string('status');
            $table->softDeletes();
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
        Schema::dropIfExists('arendator_violations');
    }
}
