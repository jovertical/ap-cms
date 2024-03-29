<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('slug')->unique();
            $table->enum('type', ['user', 'superuser', ''])->default('user');
            $table->enum('sub_type', ['reseller', 'distributor', ''])->nullable();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('verified')->default(0);
            $table->string('email_token')->nullable();
            $table->dateTime('last_activity')->nullable();
            $table->boolean('active')->default(1);

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['male', 'female', ''])->nullable();
            $table->text('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('tin')->nullable();
            $table->string('occupation')->nullable();

            $table->text('file_path')->nullable();
            $table->text('file_directory')->nullable();
            $table->string('file_name')->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
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
