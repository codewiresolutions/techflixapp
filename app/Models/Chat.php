<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    

    protected $table = 'chat_messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'message',
        'order_id',
        'sender_id',
        'sender_type',
        'status',
    ];
}
