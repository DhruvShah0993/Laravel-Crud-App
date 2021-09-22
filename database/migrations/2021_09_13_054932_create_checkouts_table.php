<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->string('prodname');
            $table->integer('qty');
            $table->float('total_amount');
            $table->float('subtotal');
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
        Schema::dropIfExists('checkouts');
    }
}
