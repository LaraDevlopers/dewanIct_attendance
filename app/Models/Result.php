<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected   $fillable =
    [
        'reg_number',
        'roll_no',
        's_name',
        'f_name',
        'm_name',
        'cgpa',
        'institute',
        'institute_code',
        'course_name',
        'course_duration',
        'passing_year',
        'date_of_birth',
    ];
}
