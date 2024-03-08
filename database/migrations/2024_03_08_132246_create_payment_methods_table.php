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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('fullName');
            $table->unsignedBigInteger('cardNumber');
            $table->date('expiryDate');
            $table->string('fiscalCountry');
            $table->string('fiscalCity');
            $table->string('fiscalStreet');
            $table->string('fiscalPostalCode');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentmethods');
    }
};
