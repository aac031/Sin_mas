<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
