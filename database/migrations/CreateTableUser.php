<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('id', 7)->primary();
            $table->string('lastname', 30);
            $table->string('firstname', 30);
            $table->string('password'); 
            $table->string('email')->unique()->constraint('^[^@\s]+@[^@\s]+\.[^@\s]+$');
            $table->boolean('administrator');
            $table->timestamp('lastLogIn')->nullable();
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
