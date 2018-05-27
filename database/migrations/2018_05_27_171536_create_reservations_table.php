<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('user_id');
            $table->string('number')->unique();
            $table->enum('status', ['pending', 'reserved', 'paid', 'cancelled', 'waiting', 'void'])->default('pending');
            $table->double('amount_taxable')->default(0.00);
            $table->double('amount_subpayable')->default(0.00);
            $table->double('amount_deductable')->default(0.00);
            $table->double('amount_payable')->default(0.00);
            $table->double('amount_paid')->default(0.00);
            $table->enum('source', ['front', 'root']);
            $table->text('note')->nullable();

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
        Schema::dropIfExists('reservations');
    }
}
