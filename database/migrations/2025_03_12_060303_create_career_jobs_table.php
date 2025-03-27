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
        Schema::create('career_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('added_by'); // Changed to unsignedBigInteger for compatibility with user ID

            $table->string('title');
            $table->string('type');
            $table->string('sub_title');
            $table->text('description');
            $table->text('experience');
            $table->string('exp_type')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->dateTime('expire_date')->nullable();
            $table->timestamps();

            // Define the foreign key constraint with onDelete and onUpdate actions
            $table->foreign('added_by')
                ->references('id')->on('users')
                ->onDelete('cascade')  // Delete related posts when the user is deleted
                ->onUpdate('cascade'); // Update related posts when the user's id is updated
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_jobs');
    }
};
