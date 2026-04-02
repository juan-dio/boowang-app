<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('nama');
            $table->string('alamat');
            $table->string('gmaps_link');
            $table->text('deskripsi');
            $table->string('image');
            $table->integer('harga_tiket');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('jumlah_tiket_weekday');
            $table->integer('jumlah_tiket_weekend');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
