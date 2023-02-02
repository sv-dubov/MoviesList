<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'genres' => GenreResource::collection($this->whenLoaded('genres')),
            'is_published' => $this->is_published,
            'poster' => $this->poster,
            'created_at' => $this->created_at
        ];
    }
}
