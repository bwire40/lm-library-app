<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_code',
        'issue_date',
        'due_date',
        'return_date',
    ];

    /**
     * The user who borrowed the book.
     */
    public function user()
    {
        return $this->belongsTo(Guest::class, 'user_id');
    }

    /**
     * The book that was borrowed.
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_code', 'book_code');
    }
}
