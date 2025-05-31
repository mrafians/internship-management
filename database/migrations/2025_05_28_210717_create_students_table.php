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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis', 10)->nullable();
            $table->enum('gender', ['L', 'P'])->nullable()->default(null);
            $table->text('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->boolean('status_pkl')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
