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
    Schema::create('bandi', function (Blueprint $table) {
        $table->id();
        $table->text('titolo');
        $table->string('link')->unique();
        $table->string('ente');
        $table->date('data_pubblicazione')->nullable();
        $table->string('area')->nullable();
        $table->string('hash')->unique();
        $table->boolean('is_new')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandos');
    }
};
