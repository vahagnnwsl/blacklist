<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArendatorFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arendator_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arendator_id');
            $table->foreign('arendator_id')->references('id')->on('arendators');
            $table->string('path');
            $table->string('mime_type');
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
        Schema::dropIfExists('arendator_files');
    }
}
