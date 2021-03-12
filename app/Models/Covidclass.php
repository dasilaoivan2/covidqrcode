<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covidclass extends Model
{
    use HasFactory;

    public function patients(){
        return $this->hasMany('App\Models\Patient');
    }
}
