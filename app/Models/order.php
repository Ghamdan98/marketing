<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'total_price',
        'address_order'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public Function user_address(){
    //     return $this->belongsTo(User_address::class);
    // }

    public function order_item()
    {
        return $this->hasMany(Order_item::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
