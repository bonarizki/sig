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
            $table->string('name');
            $table->string('id_card',16)->unique();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('address')->nullable();
            $table->string('proffesion')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number',14)->unique()->nullable();
            $table->text('image_user')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',["admin","user"])->default('user');
            $table->enum('status_register',["process","done"])->default('process');
            $table->enum('status_member',["approve","reject","process","inactive"])->default('process');
            $table->string('family_code');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
