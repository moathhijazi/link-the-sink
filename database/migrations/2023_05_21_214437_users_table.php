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
            $table->string('provider');
            $table->integer('provider_id');
            $table->string('user_type');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('provider_username')->unique();
            $table->string('provider_email')->unique();
            $table->string('password');
            $table->string('provider_avatar');
            $table->integer('code');
            $table->string('device_ip_address');
            $table->date('uploaded_at');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
