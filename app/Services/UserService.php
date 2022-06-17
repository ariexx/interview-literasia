<?php

namespace App\Services;

use Exception;
use InvalidArgumentException;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    protected $repo;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getById($id)
    {
        return $this->repo->getById($id);
    }

    public function getSinglePost($id)
    {
        $post =  $this->repo->getSinglePost($id);
        return $post;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->repo->delete($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException("User not found");
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to Delete User!");
        }
        DB::commit();
        return $user;
    }
}
