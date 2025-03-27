<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;


    protected $table = 'payment_methods';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //         'name',
    //         'merchant_id',
    //         'secret_key',
    //         'sold',
    //         'additional_parameters',
    //         'status',
    //         'display_order',
            
    //     ];

        public function scopeOrderByDisplayOrder($query)
        {
            return $query->orderBy('display_order');
        }

}
