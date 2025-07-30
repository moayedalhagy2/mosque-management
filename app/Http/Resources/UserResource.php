<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $role  = $this->roles->count() > 0 == false ? [] :
            [
                "id" => $this->roles[0]->id,
                "name" => $this->roles[0]->name,
            ];


        return [
            "id" => $this->id,
            "name" => $this->name,
            "username" => $this->username,
            "is_active" => $this->is_active,
            "created_at" => $this->created_at,
            "updated_at" =>  $this->updated_at,
            "branch" => new BranchResource($this->whenLoaded("branch")),
            "created_by" => $this->whenLoaded('creator'),
            "updated_by" => $this->whenLoaded('editor'),
            "roles" => $role,
        ];
    }
}
