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
    Schema::create('materiales', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('categoria');
        $table->integer('cantidad');
        $table->integer('minimo');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('materiales');
}
};
