<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image, // Include image URL
            'topic' => $this->topic, // Include topic
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
