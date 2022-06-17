<?php

namespace App\Services;

use App\Repository\ContactRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ContactService
{
    protected $repo;
    public function __construct(ContactRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function saveContact($data)
    {
        $validators = Validator::make(
            $data,
            [
                'name' => 'required|string|max:50',
                'number' => 'required|unique:contacts|max:15'
            ],
            [
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a string',
            ]
        );
        if ($validators->fails()) {
            throw new InvalidArgumentException($validators->errors()->first());
        }

        //save data
        $result = $this->repo->save($data);
        return $result;
    }
}
