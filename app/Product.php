<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'price', 'category_id', 'quantity', 'status', 'image'
    ];

//protected $guarded = [];

    /**
     * @var bool
//     */
//    public $timestamps = false;
//    protected $guarded = [];

    public function scopeSuccess($query)
    {
        return $query->where('status', true)->where('price', '>=', 1500);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_name', 'id');
    }

    public function getUpperNameAttribute()
    {
        return ucfirst($this->name);
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = str_replace(' ', '', $value);
    }
}
