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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('first_name', 255)->nullable();
            $table->text('last_name', 255)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_id')->nullable();
        
            $table->boolean('is_notification')->default(1);
            $table->boolean('is_block')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->string('forget_code')->nullable();
            $table->string('access_token')->nullable();
            $table->enum('payment_type',['paid','free'])->nullable();
            $table->string('voucher_code')->nullable();
            $table->enum('user_type',['superadmin', 'admin', 'user'])->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
