<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class order extends Model
{
    use HasFactory;
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'total_price',
        'address_order',
        'status'
    ];

    public function nextStatus()
    {
        return match ($this->status) {

            self::STATUS_PENDING => self::STATUS_CONFIRMED,

            self::STATUS_CONFIRMED => self::STATUS_PROCESSING,

            self::STATUS_PROCESSING => self::STATUS_SHIPPED,

            self::STATUS_SHIPPED => self::STATUS_DELIVERED,

            default => null,
        };
    }

    public function nextStatusLabel(): ?string
    {
        return match ($this->status) {

            self::STATUS_PENDING => '✔ Confirm Order',

            self::STATUS_CONFIRMED => '⚙ Start Processing',

            self::STATUS_PROCESSING => '🚚 Ship Order',

            self::STATUS_SHIPPED => '📦 Mark as Delivered',

            default => null,
        };
    }

    public function advanceStatus()
    {
        $nextStatus = $this->nextStatus();

        if (!$nextStatus) {
            return false;
        }

        $this->update([
            'status' => $nextStatus,
        ]);

        return true;
    }
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
    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_CONFIRMED,
            self::STATUS_PROCESSING,
            self::STATUS_SHIPPED,
            self::STATUS_DELIVERED,
        ];
    }

    public function currentStep(): int
    {
        return array_search($this->status, self::statuses());
    }
}
