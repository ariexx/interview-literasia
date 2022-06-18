<?php

namespace App\Http\Controllers\API;

use App\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $service;
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index($slug)
    {
        return $this->service->getPostsByTag($slug);
    }
}
