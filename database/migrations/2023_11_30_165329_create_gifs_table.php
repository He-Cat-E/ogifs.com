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
        Schema::create('gifs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("site_users")->onDelete("cascade")->nullable();

            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");

            $table->string("title");
            $table->longText("description");
            $table->string("role");
            $table->longText("gif");
            $table->string("type");
            $table->string("sound")->nullable();
            $table->string("nfsw")->nullable();
            $table->string("orientation")->nullable();
            $table->string("duration")->nullable();
            $table->string("hottest")->nullable();
            $table->integer("status");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifs');
    }
};
