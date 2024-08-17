<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeModule extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'fees_modules'; // Adjust this if your table name is different

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'date',
        'id_no',
        'ef_no',
        'name',
        'paid_amount',
    ];

    // Optionally, specify the attributes that should be cast to a specific type
    protected $casts = [
        'date' => 'date',
        'paid_amount' => 'decimal:2',
    ];

    // If the table has timestamps, and you don't want them, set this to false
    public $timestamps = false;
}
