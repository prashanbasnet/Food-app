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
            $table->id();
            $table->integer('restaurant_id')->index();
            $table->integer('subtotal');
            $table->integer('total_items');
            $table->text('items');
            $table->text('note')->nullable();
            $table->enum('order_status', ['pending', 'delivered', 'completed', 'canceled'])->default('pending');
            $table->text('order_sidenote')->nullable();
            $table->integer('user_id')->index();
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
        Schema::dropIfExists('orders');
    }
}
