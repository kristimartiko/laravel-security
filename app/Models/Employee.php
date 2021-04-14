<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'job_title',
        'image_url',
        'employee_code'
    ];
}
