<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title',
        'description',
        'content',
        'photo',
        'category_id',
        'brand_id',
        'maker_id',
        'color_id',
        'size',
        'size_id',
        'weight',
        'weight_id',
        'currency_id',
        'stock',
        'price',
        'price_offre',
        'offre_start_at',
        'offre_end_at',
        'status',
        'favored',
        'slug',
        'other_info'
    ];

    public function files()
    {
        return $this->hasMany('App\File', 'relation_id', 'id')->where('file_type', 'product');
    }

    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }

    public function maker()
    {
        return $this->hasOne('App\Model\Maker', 'id', 'maker_id');
    }

}
