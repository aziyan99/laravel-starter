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

    public function getLogoAttribute($value)
    {
        if ($value == null) {
            return "https://ui-avatars.com/api/?size=128&name=" . $this->name;
        } else {
            return $value;
        }
    }
}
