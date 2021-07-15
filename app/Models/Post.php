<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory,HasTranslations,Sluggable;
    protected $guarded = [];

    public $translatable = ['title','slug','body'];
    public function sluggable()
    {
        return [
            'slug->en' => [
                'source' => 'titleen',
            ],
            'slug->ar' => [
                'source' => 'titlear',
            ],
        ];
        
    } public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTitleenAttribute()
    {
        return $this->getTranslation('title', 'en');
    }

    public function getTitlearAttribute()
    {
        return $this->getTranslation('title', 'ar');
    }

    public function getTitlecaAttribute()
    {
        return $this->getTranslation('title', 'ca');
    }
}
