<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class UserDetail extends Model
{
    use HasFactory;


    protected $table = 'users_details';
    protected $primaryKey = 'id';

    protected $fillable = [
            'phone_number',
            'description',
            'user_id',
        ];

    // protected $appends = ['encoded_id'];

    // public function sub_categories(): BelongsTo
    // {
    //     return $this->belongsTo(SubCategory::class, 'sub_category_id');
    // }
}
