<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('itemsold');
            $table->integer('quantitysold');
            $table->integer('amountsold');
            $table->string('expenditure')->nullable;
            $table->integer('expenditureamount')->default(0);
            $table->integer('totalprice');
            //////////FK////
            $table->integer('fkuser')->unsigned();
            $table->foreign('fkuser')->references('id')->on('users');
            
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
        Schema::dropIfExists('sales');
    }
};
