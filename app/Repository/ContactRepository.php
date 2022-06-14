<?php

namespace App\Repository;

use App\Models\Contact;

class ContactRepository
{
    public function getAll()
    {
        $contacts = Contact::orderBy('id')->where('is_active', 1)->get()->map(function ($contact) {
            return $this->format($contact);
        });
        return $contacts;
    }

    public function getById($id)
    {
        $contact = Contact::query()->where('id', $id)->firstOrFail();
        return $this->format($contact);
    }

    public function createContact(array $contactDetails)
    {
        $contact = Contact::create($contactDetails);
        return $this->format($contact);
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
