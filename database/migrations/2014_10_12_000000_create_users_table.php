<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->string('email')->unique();
            $table->string('ie_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('inn')->nullable();
            $table->string('psrnie')->nullable();
            $table->string('psrn')->nullable();
            $table->string('passport')->nullable();
            $table->string('document')->nullable();
            $table->string('brand')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('web_site')->nullable();
            $table->string('advertising_number')->nullable();
            $table->integer('real_estate_count')->nullable();
            $table->string('contact_person_full_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_person_position')->nullable();
            $table->text('about_business')->nullable();
            $table->string('password')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
