<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'title',
        'image',
        'icon'
    ];
    public $translatable = ['title'];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function getImageAttribute($value): string
    {
        return 'uploaded/category/' . $value;
    }
}
