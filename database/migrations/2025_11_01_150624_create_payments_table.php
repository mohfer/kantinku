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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->unique();
            $table->enum('method', ['xendit', 'cash']);
            $table->string('xendit_invoice_id')->nullable()->unique();
            $table->string('external_id')->nullable()->unique();
            $table->string('external_url')->nullable();
            $table->decimal('amount', 10, 2);
            $table->decimal('amount_received', 10, 2)->nullable();
            $table->decimal('change', 10, 2)->nullable();
            $table->enum('status', ['PENDING', 'PAID', 'FAILED'])->default('PENDING');
            $table->string('payment_method')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
