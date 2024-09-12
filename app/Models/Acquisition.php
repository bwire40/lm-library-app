<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'book_id',
        'issue_date',
        'due_date',
        'email',
        'phone',
        'return_date',
        'book_code',
        'status',
    ];

    /**
     * The user who borrowed the book.
     */
    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    /**
     * The book that was borrowed.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function book_code()
    {
        return $this->hasMany(BookCode::class);
    }
}
