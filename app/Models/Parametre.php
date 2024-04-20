<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'meta_description',
        'meta_keywords',
        'logo',
        'favicon',
        'adresse',
        'email',
        'telephone',
        'fax',
        'footer',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'pinterest_url',
    ];
}
