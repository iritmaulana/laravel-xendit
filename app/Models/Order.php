<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'invoice_id',
        'amount',
        'status',
        'payment_method',
        'payment_channel',
        'payment_status',
        'customer_name',
        'customer_email'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
