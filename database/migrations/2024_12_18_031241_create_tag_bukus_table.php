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
        Schema::create('tag_buku', function (Blueprint $table) {
            $table->id();
            $table->string('product_number_buku');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('product_number_buku')->references('product_number')->on('buku')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_buku');
    }
};
