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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('transaction_type',['buy','rent']);
            $table->string('description');
            $table->string('required_documents');
            $table->float('cost');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('contact_method_id')->constrained('contact_methods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
