<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bond_prices', function (Blueprint $table) {
            $table->id();
            $table->string('country_code', 2);
            $table->integer('years');
            $table->string('price');
            $table->timestamps();
            $table->unique(['country_code', 'years']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bond_prices');
    }
};
