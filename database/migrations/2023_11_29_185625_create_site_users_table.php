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
        Schema::create('site_users', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("user_name")->unique();
            $table->string("email")->unique();
            $table->longText("password")->unique();

            $table->longText("facebook")->nullable();
            $table->longText("google")->nullable();
            $table->longText("twitter")->nullable();

            $table->integer("verified")->nullable();
            $table->longText("short_description")->nullable();
            $table->longText("profile_picture")->nullable();

            $table->integer("status");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_users');
    }
};
