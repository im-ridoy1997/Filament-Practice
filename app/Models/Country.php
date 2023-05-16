<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'tbl_country';

    protected $fillable = [
        'country_code',
        'name'
    ];

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }

    public function state(){
        return $this->hasMany('App\Models\State');
    }
}
