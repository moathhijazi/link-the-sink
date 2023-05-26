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
        Schema::create('users_info', function (Blueprint $table) {
            $table->id();
            $table->integer('for_user_id');
            $table->string('linkedin_link');
            $table->string('github_link');
            $table->string('cv_path');
            $table->text('bio');
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
