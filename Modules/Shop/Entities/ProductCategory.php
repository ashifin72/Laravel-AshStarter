<?php

namespace Modules\Shop\Entities;

use App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
  use HasFactory;
  use Sluggable;
  public function sluggable(): array
  {
    $locale = App::getLocale();

    return [
      'slug' => [
        'source' => "title_" . $locale
      ]
    ];
  }
  protected $fillable = [
    'id',
    'status',
    'img',
    'icon',
    'title_ru',
    'title_uk',
    'title_en',
    'slug',
    'sort',
    'deleted_at',
    'description_uk',
    'description_ru',

  ];
  public function getTitleAttribute()
  {
    $locale = App::getLocale();
    $column = "title_" . $locale;
    return $this->{$column};
  }
  public function getDescriptionAttribute()
  {
    $locale = App::getLocale();
    $column = "description_" . $locale;
    return $this->{$column};
  }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductCategoryFactory::new();
    }
}
