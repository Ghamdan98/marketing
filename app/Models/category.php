<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
    ];
    use HasFactory;

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
