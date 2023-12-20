<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('userId')->constrained('users');
            $table->foreignId('deviceId')->constrained('devices');
            $table->date('start_date');
            $table->date('end_date')->nullable(); 
            $table->timestamps(); //
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
