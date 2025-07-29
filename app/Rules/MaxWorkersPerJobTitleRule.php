<?php

namespace App\Rules;


use App\Models\Worker;
use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class MaxWorkersPerJobTitleRule implements ValidationRule
{
    protected $mosqueId;
    protected $jobTitle;
    protected $currentWorkerId;

    public function __construct($mosqueId, $jobTitle, $currentWorkerId = null)
    {
        $this->mosqueId = $mosqueId;
        $this->jobTitle = $jobTitle;
        $this->currentWorkerId = $currentWorkerId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $query = Worker::where('mosque_id', $this->mosqueId)
            ->where('job_title', $this->jobTitle);

        // استثناء العامل الحالي في حالة التعديل

        if ($this->currentWorkerId) {
            $query->where('id', '!=', $this->currentWorkerId);
        }

        if ($query->count() > 4) {
            $fail(__('validation.max_worker_per_job_title'));
        }
    }
}
