<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceTerm extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'service'
    ];
    public $translatable = ['service'];
}
