<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerJob extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'career_jobs';

    // Define the fillable properties to prevent mass-assignment vulnerabilities
    protected $fillable = [
        'added_by',
        'title',
        'type',
        'sub_title',
        'description',
        'experience',
        'exp_type',
        'status',
        'expire_date',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    public function applicants()
    {
        return $this->hasMany(JobApplicant::class, 'job_id');
    }

    // Override the delete method to soft delete related applicants
    public function delete()
    {
        // Soft delete all related applicants
        $this->applicants()->delete();
        // Then soft delete the job
        return parent::delete();
    }



}
