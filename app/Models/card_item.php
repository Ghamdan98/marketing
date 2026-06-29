<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_item extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'card_id',
        'quantity',
        'price'
    ];
    use HasFactory;

    public function card(){
        return $this->belongsTo(Card::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
