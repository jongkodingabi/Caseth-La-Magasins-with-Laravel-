<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('status_pesanans', function (Blueprint $table) {
            $table->id(); // ID sebagai primary key
            $table->unsignedBigInteger('user_id'); // Kolom dapat bernilai NULL
            $table->decimal('total_all', 15, 2); // Total keseluruhan
            $table->enum('status', ['Pending', 'Processed', 'Delivery', 'Completed', 'Cancelled'])->default('Pending'); // Status pesanan
            $table->string('alamat'); // Alamat
            $table->string('tipe_hp'); // Tipe HP
            $table->string('masukkan')->nullable(); // Kolom masukkan (optional)
            $table->integer('destination'); // Kolom destination (id kota tujuan)
            $table->string('bukti_pembayaran');
            $table->timestamps(); // Timestamps (created_at, updated_at)

            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pesanan');
    }
};
