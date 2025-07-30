<?php

namespace App\Http\Resources;

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
            "job_title" => $this->job_title,
            "job_status" => $this->job_status,
            "mosque_id" => $this->mosque_id,
            "updated_at" => $this->mosque_id,
            "created_at" => $this->mosque_id,
            "image" =>  $this->getFirstMediaUrl(class_basename(Worker::class)),
            'mosque' => new MosqueResource($this->whenLoaded('mosque')),
            'creator' => $this->whenLoaded('creator'),
            'editor' => $this->whenLoaded('editor'),
        ];
    }
}
