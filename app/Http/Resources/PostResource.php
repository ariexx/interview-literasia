<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'tags' => $this->tags->map(fn ($tag) => $tag->name), //kenapa harus di map ????
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => $this->user->name,
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'message' => 'Success Get Single Post'
        ];
    }
}