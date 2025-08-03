<?php

namespace App\Http\Resources;

use App\Enums\RoleEnum;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WrokerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            "id" => $this->id,
            "name" => $this->name,
            "phone" => $this->phone,
            $this->mergeWhen($request->user()->isAnyAdmin(), [
                'salary' => $this->salary,
                'salary_sy' => $this->salary_sy,
                'sham_cash' => $this->sham_cash
            ]),
            "job_title" => $this->job_title,
            "job_status" => $this->job_status,
            "quran_levels" => $this->quran_levels,
            "sponsorship_types" => $this->sponsorship_types,
            "educational_level" => $this->educational_level,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "image" =>  $this->getFirstMediaUrl(class_basename(Worker::class)),
            "mosque_id" => $this->mosque_id,
            'mosque' => new MosqueResource($this->whenLoaded('mosque')),
            'creator' => $this->whenLoaded('creator'),
            'editor' => $this->whenLoaded('editor'),
        ];
    }
}
