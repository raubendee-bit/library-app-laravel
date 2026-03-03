<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Add this line below:
    protected $fillable = ['title', 'author', 'is_borrowed', 'photo'];
}