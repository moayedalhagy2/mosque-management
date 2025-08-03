<?php

use App\Enums\WorkerEducationalLevelEnum;
use App\Enums\WorkerJobStatusEnum;
use App\Enums\WorkerJobTitleEnum;
use App\Enums\WorkerQuranHifzLevelEnum;
use App\Enums\WorkerSponsorshipTypeEnum;
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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Mosque::class)->constrained()->cascadeOnDelete();
            $table->enum('job_title', WorkerJobTitleEnum::values());
            $table->string('name');
            $table->string('phone')->nullable();
            $table->enum('job_status', WorkerJobStatusEnum::values());
            $table->enum('quran_levels', WorkerQuranHifzLevelEnum::values());
            $table->enum('sponsorship_types', WorkerSponsorshipTypeEnum::values());
            $table->enum('educational_level', WorkerEducationalLevelEnum::values());
            $table->decimal('salary', 12, 2)->nullable();
            $table->decimal('salary_sy', 12, 2)->nullable();
            $table->string('sham_cash')->nullable();
            $table->userstamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
