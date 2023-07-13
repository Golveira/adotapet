<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaryCare extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}