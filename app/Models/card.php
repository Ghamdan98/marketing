<?php

namespace App\Models;

use Doctrine\Inflector\CachedWordInflector;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    protected $fillable = [
        'user_id'
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function card_item(){
        return $this->hasMany(Card_item::class);
    }
}
