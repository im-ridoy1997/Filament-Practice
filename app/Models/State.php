<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'tbl_state';

    protected $fillable = [
        'country_id',
        'name'
    ];

    public function city(){
        return $this->hasMany('App\Models\City');
    }

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }
}
