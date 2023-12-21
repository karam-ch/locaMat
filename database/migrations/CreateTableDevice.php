<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id(); 
            $table->enum('type', ['TEL', 'PC', 'TAB']);
            $table->string('name', 30);
            $table->string('ref', 5);
            $table->string('version'); 
            $table->binary('image')->nullable();
            $table->char('tel', 10)->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
