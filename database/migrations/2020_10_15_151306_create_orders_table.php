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
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('user_id');
     //       $table->foreign('store_id')->references('id')->on('Stores');
       //      $table->foreign('table_id')->references('id')->on('Tables');
         //   $table->foreign('article_id')->references('id')->on('Articles');
       //     $table->active('active');
        //    $table->timestamps();
            
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
