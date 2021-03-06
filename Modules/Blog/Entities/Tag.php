<?php

namespace Modules\Blog\Entities;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{

    use Sluggable;
    public function sluggable(): array
    {
        $locale = App::getLocale();
        return [
            'slug' => [
                'source' => 'title'. $locale
            ]
        ];
    }
    protected $fillable = [
        'title_uk',
        'title_ru',
        'title_en',
        'slug',
    ];

    public function getTitleAttribute()
    {
        $locale = App::getLocale();
        $column = "title_" . $locale;
        return $this->{$column};
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


}
