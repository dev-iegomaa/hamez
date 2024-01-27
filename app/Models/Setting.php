<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'email',
        'phone',
        'logo',
        'title',
        'location',
        'facebook',
        'whatsapp',
        'instagram',
        'tiktok',
        'snapchat',
        'opening_from',
        'opening_to',
        'time_from',
        'time_to',
    ];
    public $translatable = ['title', 'location'];

    public function getLogoAttribute($value): string
    {
        return 'uploaded/setting/' . $value;
    }
}
