<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('reservation_id');
            $table->integer('product_id');
            $table->integer('quantity')->default(0);
            $table->double('amount_original')->default(0.00);
            $table->double('amount_taxable')->default(0.00);
            $table->double('amount_subpayable')->default(0.00);
            $table->double('amount_deductable')->default(0.00);
            $table->double('amount_payable')->default(0.00);

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
        Schema::dropIfExists('reservation_products');
    }
}
