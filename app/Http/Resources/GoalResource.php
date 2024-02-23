<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoalResource extends JsonResource
{
    public function toArray($request)
{
    return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'due_date' => $this->due_date,
        'completed' => $this->completed,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
}
}
