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
        Schema::table('tagihan_kuliahs', function (Blueprint $table) {
            // Add new billing type and enhanced fields
            $table->string('billing_type')->after('group_id')->nullable(); // SPP, UTS, UAS, etc.
            $table->text('description')->after('desc')->nullable(); // Detailed description
            $table->boolean('is_mandatory')->after('description')->default(false); // Mandatory payment
            $table->boolean('is_recurring')->after('is_mandatory')->default(false); // Recurring payment
            $table->enum('recurring_type', ['monthly', 'semester', 'yearly'])->after('is_recurring')->nullable();
            $table->integer('semester')->after('recurring_type')->nullable(); // Academic semester
            $table->decimal('discount_amount', 15, 2)->after('semester')->default(0); // Discount if any
            $table->decimal('penalty_amount', 15, 2)->after('discount_amount')->default(0); // Late penalty
            $table->date('payment_deadline')->after('penalty_amount')->nullable(); // Final deadline
            $table->json('metadata')->after('payment_deadline')->nullable(); // Additional data
            
            // Payment tracking
            $table->decimal('paid_amount', 15, 2)->after('metadata')->default(0); // Amount paid
            $table->decimal('remaining_amount', 15, 2)->after('paid_amount')->default(0); // Remaining amount
            $table->timestamp('paid_at')->after('remaining_amount')->nullable(); // Payment timestamp
            $table->string('payment_method')->after('paid_at')->nullable(); // Payment method used
            $table->string('payment_reference')->after('payment_method')->nullable(); // Payment reference/transaction ID
            
            // Academic integration
            $table->string('prodi_id')->after('payment_reference')->nullable(); // Program studi
            $table->string('kelas_id')->after('prodi_id')->nullable(); // Class reference
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tagihan_kuliahs', function (Blueprint $table) {
            $table->dropColumn([
                'billing_type',
                'description',
                'is_mandatory',
                'is_recurring',
                'recurring_type',
                'semester',
                'discount_amount',
                'penalty_amount',
                'payment_deadline',
                'metadata',
                'paid_amount',
                'remaining_amount',
                'paid_at',
                'payment_method',
                'payment_reference',
                'prodi_id',
                'kelas_id'
            ]);
        });
    }
};