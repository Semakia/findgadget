<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->String('client_firstname');
            $table->String('client_lastname');
            $table->String('adresse');
            $table->String('client_email');
            //$table->unsignedBigInteger('gadget_id');
           // $table->foreign('gadget_id')->references('id')->on('gadgets')->onDelete('cascade');
            //$table->String('gadget')
            $table->String('panier');
            $table->String('payment_id');
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
        Schema::dropIfExists('commandes');
    }
}
