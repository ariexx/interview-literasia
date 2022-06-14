<?php

namespace App\Traits;

use App\Models\Contact;

trait ContactTrait
{
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function getContacts()
    {
        $contact = Contact::all();
        return $contact;
    }
}
