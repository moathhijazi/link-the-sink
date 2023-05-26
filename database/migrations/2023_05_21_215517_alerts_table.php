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
        Schema::create('alerts', function (Blueprint $table) {
            
            $table->id();
            $table->integer('alert_from_id');
            $table->string('title');
            $table->text('description');
            $table->string('image_path');
            $table->string('status');
            $table->string('link');
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
