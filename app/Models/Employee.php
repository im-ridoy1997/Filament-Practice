<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_employee';

    protected $fillable = [
        'country_id',
        'state_id',
        'city_id',
        'department_id',
        'name',
        'address',
        'birth_date',
        'date_hired',
        'zipcode'
    ];
}
