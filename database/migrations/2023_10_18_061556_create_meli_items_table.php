<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('meli_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_id')->unique();
            $table->string('title');
            $table->enum('status', ['Em processamento', 'Processado'])->default('Em processamento');
            $table->integer('visits')->nullable();
            $table->timestamp('updated');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('meli_items');
    }
};
