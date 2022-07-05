<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'title',
      'code',
      'sort',
      'value',
      'status',
      'favorite'
    ];

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CurrencyFactory::new();
    }
}
