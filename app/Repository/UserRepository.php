<?php

namespace App\Repository;

use App\Models\Post;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\PostResource;

class UserRepository
{
    protected $user;
    protected $post;
    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function save($data)
    {
        $table = new $this->user;
        $table->fill($data);
        $table->save();

        $result = new UserResource($table);
        return $result;
    }

    public function getSinglePost($id)
    {
        $result = new PostResource($this->post->findOrFail($id));
        return $result;
    }

    public function getAll()
    {
        $query = $this->user->get();
        new UserCollection($query);
    }

    public function getById($id)
    {
        $result = new UserResource($this->user->findOrFail($id));
        return $result;
    }


    public function create(array $contactDetails)
    {
        $contact = User::create($contactDetails);
        return new UserResource($contact);
    }

    public function update($id, array $contactDetails)
    {
        $contact = User::whereId($id)->update($contactDetails);
        return $contact;
    }

    public function delete($id)
    {
        $user = $this->model->findOrFail($id);
        $user->delete();
        return $user;
    }
}
