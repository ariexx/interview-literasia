<?php

namespace App\Repository;

use App\Models\Contact;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactCollection;

class ContactRepository
{
    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function save($data)
    {
        $table = new $this->model;
        $table->fill($data);
        $table->save();

        $result = new ContactResource($table);
        return $result;
    }

    public function getAll()
    {
        $query = $this->model->where('is_active', 1)->get();
        return new ContactCollection($query);
    }

    public function getById($id)
    {
        $contact = Contact::query()->where('id', $id)->firstOrFail();
        return new ContactCollection($this->format($contact));
    }

    public function createContact(array $contactDetails)
    {
        $contact = Contact::create($contactDetails);
        return new ContactResource($this->format($contact));
    }

    public function updateContact($id, array $contactDetails)
    {
        $contact = Contact::whereId($id)->update($contactDetails);
        return $contact;
    }

    public function deleteContact($id)
    {
        $contact = Contact::whereId($id)->delete();
        return $contact;
    }

    public function format($contact)
    {
        return [
            'contact_id' => $contact->id,
            'name' => $contact->name,
            'phone_number' => $contact->number,
            'is_active' => $contact->is_active ? 'active' : 'inactive'
        ];
    }
}
