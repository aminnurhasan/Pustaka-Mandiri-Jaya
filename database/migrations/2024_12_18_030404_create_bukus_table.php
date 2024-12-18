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
        Schema::create('buku', function (Blueprint $table) {
            $table->string('product_number')->primary();
            $table->string('judul');
            $table->string('cover_buku');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->decimal('berat', 8, 2);
            $table->enum('stok', ['tersedia', 'habis']);
            $table->string('penulis');
            $table->string('jml_halaman');
            $table->string('dimensi');
            $table->string('isbn')->nullable();
            $table->string('e_isbn')->nullable();
            $table->date('tgl_terbit')->nullable();
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
        Schema::dropIfExists('bukus');
    }
};
