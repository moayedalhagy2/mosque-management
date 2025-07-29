<?php

use App\Enums\MosqueTypeEnum;
use App\Models\Mosque;
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
        Schema::create('mosque_types', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(Mosque::class)->constrained()->cascadeOnDelete();

            $table->enum('type', MosqueTypeEnum::values());

            $table->timestamps();

            $table->unique(['type', 'mosque_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosque_types');
    }
};
