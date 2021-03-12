<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinator extends Model
{
    use HasFactory;

    protected $fillable = ['lastname', 'firstname', 'middlename', 'profession'];

    public function patients(){
        return $this->hasMany('App\Models\Patient');
    }

    public function fullname(){
        return $this->lastname.", ".$this->firstname." ".$this->middlename;
    }
}
