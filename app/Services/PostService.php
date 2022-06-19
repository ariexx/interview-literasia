<?php

namespace App\Services;

use App\Repository\PostRepository;

class PostService
{
    protected $repo;
    public function __construct(PostRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getPostsByTag($slug)
    {
        return $this->repo->getPostsByTag($slug);
    }

    // public function getCommentsPost($id)
    // {
    //     return $this->repo->getCommentsPost($id);
    // }
}
