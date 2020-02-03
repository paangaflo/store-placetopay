<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_type_identification', 2);
            $table->integer('customer_number_identification');
            $table->string('customer_name', 80);
            $table->string('customer_surname', 80);
            $table->string('customer_email', 120);
            $table->string('customer_mobile', 40);
            $table->enum('status', ['CREATED', 'PAYED','REJECTED']);
            $table->integer('quantity');
            $table->unsignedBigInteger('products_id')->nullable(false);
            $table->unsignedBigInteger('users_id')->nullable(false);
            $table->string('placetopay_request_id')->nullable(true);
            $table->longText('placetopay_process_url')->nullable(true);
            $table->timestamps();
            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
