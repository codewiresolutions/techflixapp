<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodList extends Model
{
    use HasFactory;

    protected $table = 'payment_method_lists';
    protected $primaryKey = 'id';

    protected $fillable = [
            'name',
            'instructions',
            'currency',
            'status',
            
        ];
}
