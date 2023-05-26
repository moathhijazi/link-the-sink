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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user_id');
            $table->string('title');
            $table->text('description');
            $table->string('image_path');
            $table->string('links_number');
            $table->string('link');
            $table->string('post_status');
            $table->integer('accepted_by');
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
