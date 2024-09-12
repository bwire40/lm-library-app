<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCode extends Model
{
    use HasFactory;

    protected $fillable = [
        "book_code",
        "book_id"
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function acquisition()
    {
        return $this->belongsTo(Acquisition::class);
    }
}
