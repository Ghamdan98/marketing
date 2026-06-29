<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'sele_price',
        'description',
        'category_id',
        'image',
        'quantity'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function card_item(){
        return $this->hasMany(Card_item::class);
    }
    public function product_image(){
        return $this->hasMany(Product_image::class);
    }
    public function product_review(){
        return $this->hasMany(Product_review::class);
    }
}
