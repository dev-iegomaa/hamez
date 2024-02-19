<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'place',
        'category_id',
        'service_id',
        'available_time',
        'full_name',
        'phone_number',
        'subject',
        'email',
        'birth_date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
