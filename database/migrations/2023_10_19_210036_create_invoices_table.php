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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            //$table->unsignedBigInteger('customer_id');
            
            $table->date('date');
            //$table->unsignedBigInteger('pay_mode_id');
            
            $table->timestamps();

            //$table->foreign('customer_id')->references('id')->on('customers');
            //$table->foreign('pay_mode_id')->references('id')->on('pay_mode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
