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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("follow_id");
            $table->foreign("follow_id")->references("id")->on("site_users")->onDelete("cascade");

            $table->unsignedBigInteger("follower_id");
            $table->foreign("follower_id")->references("id")->on("site_users")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
