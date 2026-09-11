<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('turnstile_id')
                ->constrained()//tablodaki ıd ile bağlantı kuruyourz
                

            $table->string('code')->unique();
            $table->timestamp('used_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};