<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'cover' => $this->cover,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'publish_date' => $this->publish_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'author' => new AuthorResource($this->whenLoaded('author')),
            'publisher' => new PublisherResource($this->whenLoaded('publisher')),
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
