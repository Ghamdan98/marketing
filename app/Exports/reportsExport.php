<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection, WithHeadings
{
    protected Collection $orders;

    public function __construct(Collection $orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders->map(function ($order) {

            return [

                'Order ID'      => $order->id,

                'Customer'      => $order->user->name,

                'Email'         => $order->user->email,

                'Status'        => ucfirst($order->status),

                'Total Price'   => $order->total_price,

                'Created At'    => $order->created_at->format('Y-m-d H:i'),

            ];

        });
    }

    public function headings(): array
    {
        return [

            'Order ID',

            'Customer',

            'Email',

            'Status',

            'Total Price',

            'Created At',

        ];
    }
}