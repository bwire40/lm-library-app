<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "genre",
        "date_published",
        "author",
        "image",
        "book_code",
        "genre_id",
        "copies_number",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function acquisition()
    {

        return $this->hasMany('App\Acquisition');
    }
}
