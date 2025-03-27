<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class SubCategory extends Model
{
    use HasFactory;


    protected $table = 'sub_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'package_type',
        'category_id',
    ];

    // protected $appends = ['encoded_id'];



    protected $with = ['sub_category_details'];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function sub_category_details() : HasMany
    {
        return $this->hasMany(SubCategoryDetail::class, 'sub_category_id', 'id');
    }
}
