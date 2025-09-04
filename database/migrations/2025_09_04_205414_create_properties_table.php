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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('location_id');
            $table->integer('time_id');
            $table->text('location_map')->nullable();
            $table->text('details')->nullable();

            $table->enum('is_featured', ['yes','no'])->default('no');
            $table->enum('status', ['1','0'])->default('1');

            // Investment Info
            $table->string('investment_type')->nullable();
            $table->integer('total_share')->nullable();
            $table->decimal('per_share_amount', 12,2)->nullable();
            $table->string('capital_back')->nullable();
            $table->decimal('profit_back', 12,2)->nullable();

            // Installment info
            $table->enum('profit_type', ['fixed','range'])->nullable();
            $table->integer('total_installment')->nullable();
            $table->decimal('down_payment',12,2)->nullable();
            $table->decimal('per_installment_amount',12,2)->nullable();
            $table->decimal('installment_late_fee',12,2)->nullable();
            $table->string('time_between_installment')->nullable();

            /// Profit Rang
            $table->string('profit_amount_type')->nullable();
            $table->decimal('minimum_profit_amount',12,2)->nullable();
            $table->decimal('profit_amount',12,2)->nullable();

            // Distribution Settings 
            $table->string('profit_distribution')->nullable();
            $table->decimal('auto_profit_distribution')->nullable();
            $table->string('profit_schedule')->nullable();
            $table->string('profit_schedule_period')->nullable();
            $table->integer('repeat_time')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
