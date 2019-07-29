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
        'other_info'
    ];

    public function files()
    {
        return $this->hasMany('App\File', 'relation_id', 'id')->where('file_type', 'product');
    }
}
