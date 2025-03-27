<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'order_id',
    //     'payment_method',
    //     'amount',
    // ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    protected $fillable = ['user_id', 'sub_category_id', 'payment_method'];

    public function save(array $options = [])
    {
        if (auth()->check()) {
            $this->user_id = auth()->user()->id;
        }

        return parent::save($options);
    }
}
