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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 150);
            $table->string('username', 150);
            $table->string('password', 100);
            $table->timestamps();
        });
        
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            $table->string('usertype', 15);
            $table->string('address')->nullable();
            $table->string('phone', 15)->unique()->nullable();
            $table->foreignId('user_id')->reference('id')->on('users')->ondelete('cascade');
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('userinfos');
    }
};
