<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_rows', function (Blueprint $table) {
            $table->unsignedInteger('book_id')->index();;
            $table->unsignedInteger('order_id')->index();;
            $table->unsignedInteger('qty');
            $table->primary('book_id', 'order_id');
            $table->timestamps();
        });

        Schema::table('order_rows', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_rows');
    }
}
