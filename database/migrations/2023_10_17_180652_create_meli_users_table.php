<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meli_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ref_id')->unique();
            $table->string('nickname');
            $table->string('access_token')->unique();
            $table->string('refresh_token')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meli_users');
    }
};
