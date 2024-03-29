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
        Schema::create('manegars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->default(0);
            $table->string('id_number', 45)->default(0);
            $table->string('phone_number', 45)->default(0);
            $table->string('image')->nullable();
            $table->string('job', 45)->default(0);
            $table->foreignId('admin_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manegars');
    }
};
