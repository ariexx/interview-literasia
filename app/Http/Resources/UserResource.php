<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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

        if ($this->posts) {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'country' => $this->address->country,
                'posts' => $this->posts->map(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'body' => $post->body,
                        'created_at' => $post->created_at,
                        'updated_at' => $post->updated_at
                    ];
                }),
            ];
        }

        return [
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->address->country,
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'message' => 'Successfully'
        ];
    }
}
