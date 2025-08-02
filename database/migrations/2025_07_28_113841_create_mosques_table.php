<?php

use App\Enums\MosqueAttachmentsEnum;
use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueDemolitionPercentageEnum;
use App\Enums\MosqueDestructionStatusEnum;
use App\Models\Branch;
use App\Models\District;
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
        Schema::create('mosques', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->foreignIdFor(Branch::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(District::class)->constrained()->cascadeOnDelete();
            $table->string('cirty_or_village');

            $table->enum('category', MosqueCategoryEnum::values());
            $table->enum('current_status', MosqueBuildingStatusEnum::values());
            $table->enum('technical_status', MosqueConditionEnum::values());
            $table->enum('mosque_attachments', MosqueAttachmentsEnum::values());
            $table->enum('demolition_percentage', MosqueDemolitionPercentageEnum::values());
            $table->enum('destruction_status', MosqueDestructionStatusEnum::values());

            $table->boolean('is_active');
            $table->boolean('support_friday');

            $table->text('description')->nullable();
            // Location coordinates
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
            $table->userstamps();
            // Indexes
            $table->index('category');
            $table->index('current_status');
            $table->index('technical_status');
            $table->index('mosque_attachments');
            $table->index('demolition_percentage');
            $table->index('destruction_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosques');
    }
};
