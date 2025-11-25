<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('tweet_id')->constrained('tweets')->onDelete('cascade');
            $table->timestamps();

            // ensure one user can like a tweet only once
            $table->unique(['user_id', 'tweet_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
