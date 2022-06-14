<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ContactTrait;

class Contact extends Model
{
    use HasFactory, ContactTrait;

    protected $fillable = [
        'name', 'number', 'is_active'
    ];
}
