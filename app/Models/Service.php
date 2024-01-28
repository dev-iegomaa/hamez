<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'title',
        'price',
        'description',
        'category_id'
    ];
    public $translatable = ['title', 'price', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
