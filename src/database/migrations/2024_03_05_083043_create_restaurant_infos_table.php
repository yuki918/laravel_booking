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
        Schema::create('restaurant_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('img');
            $table->text('information');
            $table->text('time');
            $table->text('budget');
            $table->string('zip');
            $table->string('pref');
            $table->string('city');
            $table->string('address');
            $table->string('tel');
            $table->boolean('is_selling');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_infos');
    }
};
