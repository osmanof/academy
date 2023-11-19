<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thema extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'deadline_date',
        'deadline_time',
        'type',
        'course_id'
    ];
}
