<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // // Ensure the dates are treated as Carbon instances
    // protected $dates = ['issued_date', 'due_date', 'return_date'];

    // // Calculate overdue days
    // public function getOverdueDaysAttribute()
    // {
    //     // If the actual return date is not set or is before/on the expected date, return 0
    //     if (!$this->return_date || $this->return_date <= $this->due_date) {
    //         return 0;
    //     }

    //     // Otherwise, calculate the overdue days
    //     return $this->return_date->diffInDays($this->due_date);
    // }
}