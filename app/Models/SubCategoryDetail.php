<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SubCategoryDetail extends Model
{
    use HasFactory;



    protected $table = 'sub_category_details';
    protected $primaryKey = 'id';

    protected $fillable = [
            'type',
            'description',
            'price',
            'delivery_time',
            'pages',
            'sub_details',
            'sub_category_id',
        ];

    // protected $appends = ['encoded_id'];

    public function sub_categories(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
