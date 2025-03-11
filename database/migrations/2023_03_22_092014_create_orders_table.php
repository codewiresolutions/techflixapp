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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->enum('status', ['Completed', 'Canceled', 'Pending','Active'])->default('Pending');
            $table->string('image')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->enum('payment_type',['paid','free'])->nullable();
            $table->string('currency');
            $table->string('current_subscription_start')->nullable();
            $table->string('current_subscription_end')->nullable();
            $table->string('stripe_payment_status')->nullable();  
            $table->string('payment_stripe_status')->nullable();
            $table->string('payment_paypal_status')->nullable();
            $table->timestamp('stripe_start_date')->nullable();
            $table->timestamp('stripe_end_date')->nullable();
            $table->timestamp('paypal_start_date')->nullable();
            $table->timestamp('paypal_end_date')->nullable();
            $table->timestamp('package_start_date_time')->nullable();
            $table->timestamp('package_end_date_time')->nullable();
            $table->foreignId('subcategory_id')->constrained('sub_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
