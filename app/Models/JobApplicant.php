<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'job_applicants';

    // Define the fillable properties to prevent mass-assignment vulnerabilities
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'cv',
        'portfolio',
    ];

    // Define the relationship with the CareerJob model
    public function job()
    {
        return $this->belongsTo(CareerJob::class, 'job_id');
    }
}
