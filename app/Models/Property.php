<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties'; // Specify the table name if different from default
    protected $fillable = [
        'place',
        'image',
        'rent',
        'house_details',
        'bed',
        'bathroom',
        'belcony',
        'kitchen'
    ];
}
