<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banniere extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'slug',
        'description',
        'photo',
        'statut',
        'condition'
    ];
}
