<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            
            // fix
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_desc')->nullable();
            $table->string('product_img')->nullable();
            $table->integer('qty');
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
        Schema::dropIfExists('details');
    }
}
