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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->tinyText('first_name');
            $table->tinyText('last_name');
            $table->unsignedBigInteger('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status',['active','inactive','banned'])->default('inactive');
            $table->enum('level',['manager','operator'])->default('manager');
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managers');
    }
};
