<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code')->nullable();
            $table->string('order_date')->nullable();                                  # Fecha de cuando se desea recibir el pedido
            $table->date('arrived_date')->nullable();        # Fecha de llegada del pedido
            $table->string('status');                                       # Active, Pending, Approved, Cancelled, Finished
            
            $table->float('total')->default(0.0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('carts');
    }
}
