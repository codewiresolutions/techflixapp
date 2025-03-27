<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
            'name',
            'price',
            'payment_status',
            'current_subscription_start',
            'current_subscription_end',
            'stripe_payment_status',
            'payment_stripe_status',
            'payment_paypal_status',
            'stripe_start_date',
            'stripe_end_date',
            'paypal_start_date',
            'paypal_end_date',
            'package_start_date_time',
            'payment_type',
            'package_end_date_time',


        ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(SubCategoryDetail::class, 'subcategory_id ','id');
    }

}
