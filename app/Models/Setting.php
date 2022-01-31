<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'address',
        'phone_number',
        'email',
        'facebook',
        'instagram',
        'twitter'
    ];

    public function getLogoPathAttribute()
    {
        if ($this->logo == null) {
            return "https://ui-avatars.com/api/?size=128&name=" . $this->name;
        } else {
            return "http://localhost:8000/storage/" . $this->logo;
        }
    }
}
