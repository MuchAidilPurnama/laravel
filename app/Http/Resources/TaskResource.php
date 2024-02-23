<?php

namespace App\Http\Resources;

use App\Http\Resources\TaskCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'completed' => $this->completed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link/to/current/page',
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ],
        ];
    }
}
