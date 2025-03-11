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
            $table->string('payment_method');
            $table->string('name')->nullable();
            $table->string('pm_account_id')->nullable();
            $table->string('pm_passphrase')->nullable();
            $table->string('paypal_sandbox_client_id')->nullable();
            $table->string('paypal_sandbox_client_secret')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->string('aamarpay_sandbox')->nullable();
            $table->string('aamarpay_key')->nullable();
            $table->string('aamarpay_store_id')->nullable();
            $table->string('status')->default(1);
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
            // $table->foreign('payment_method_lists_id')->references('id')->on('payment_method_lists')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
