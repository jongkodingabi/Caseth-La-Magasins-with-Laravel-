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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');  // Jika ada sistem login
            $table->string('origin');
            $table->string('destination');
            $table->string('courier');
            $table->string('service');
            $table->integer('weight');  // Berat dalam gram
            $table->decimal('total_price', 10, 2);
            $table->string('tipe_hp')->nullable();
            $table->text('masukkan')->nullable();
            $table->text('alamat');
            $table->string('payment_photo');
            $table->enum('status', ['Pending', 'Processed', 'Delivery', 'Completed', 'Cancelled'])->default('Pending'); // Status pesanan
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
