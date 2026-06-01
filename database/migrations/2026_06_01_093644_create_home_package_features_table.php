<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('home_package_features')) {
            Schema::create('home_package_features', function (Blueprint $table) {
                $table->id();
                $table->foreignId('service_package_id')->constrained()->cascadeOnDelete();
                $table->string('feature');
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('home_package_features');
    }
};
