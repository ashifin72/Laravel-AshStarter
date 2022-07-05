<?php

  namespace Modules\Shop\Entities;

  use App;
  use Cviebrock\EloquentSluggable\Sluggable;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\SoftDeletes;

  class Product extends Model
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

    use SoftDeletes;

    protected $fillable = [
      'id',
      'category_id',
      'status',
      'img',
      'title_ru',
      'title_uk',
      'slug',
      'sort',
      'deleted_at',
      'price',
      'old_price',
      'keywords',
      'hit',
      'description_uk',
      'description_ru',
      'content_ru',
      'content_uk',
      'created_at',
      'updated_at',

    ];

    public function getTitleAttribute()
    {
      $locale = App::getLocale();
      $column = "title_" . $locale;
      return $this->{$column};
    }

    public function getContentAttribute()
    {
      $locale = App::getLocale();
      $column = "content_" . $locale;
      return $this->{$column};
    }

    public function getDescriptionAttribute()
    {
      $locale = App::getLocale();
      $column = "description_" . $locale;
      return $this->{$column};
    }

    public function parentCategory()
    {
      return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    protected static function newFactory()
    {
      return \Modules\Shop\Database\factories\ProductFactory::new();
    }
  }
