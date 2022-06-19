<?php

namespace App\Repository;

use App\Http\Resources\PostResource;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Resources\TagResource;

class PostRepository
{
    protected $model;
    protected $tag;
    public function __construct(Post $model, Tag $tag)
    {
        $this->model = $model;
        $this->tag = $tag;
    }

    public function getPostsByTag($slug)
    {
        $result = $this->model->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
        // return $result;
        return new TagResource($result);
    }

    // public function getCommentsPost($id)
    // {
    //     $result = $this->model->findOrFail($id)->comments;
    //     return new PostResource($result);
    // }
}
