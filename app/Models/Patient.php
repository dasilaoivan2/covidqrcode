<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    //from database table - column name
    protected $fillable = ['category_id',
        'idcard_id',
        'id_no',
        'philhealth',
        'pwd',
        'firstname',
        'lastname',
        'middlename',
        'suffixname',
        'contact_no',
        'region_id',
        'province_id',
        'municipality_id',
        'barangay_id',
        'sex',
        'birthday',
        'consent',
        'reason',
//        'more_sixteen',
//        'allergy_peg',
//        'allergy_react',
//        'allergy_food',
//        'if_allergy_food',
//        'history_bleeding',
//        'if_history_bleeding',
//        'manifest_symptoms',
//        'if_manifest',
//        'history_exp_covid',
//        'treated_covid',
//        'received_vaccine',
//        'received_antibodies',
//        'pregnant',
//        'if_pregnant',
//        'terminal_illness',
//        'if_terminal_illness',
//        'present_clearance',
        'deferral',
        'date_vaccinated',
        'time_vaccinated',
        'vaccine_manufacturer',
        'batch_no',
        'lot_no',
        'vaccinator_id',
        'first_dose',
        'second_dose',
        'user_id',
        'question_id'];

    public function barangay(){
        return $this->belongsTo('App\Models\Barangay');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region');
    }

    public function province(){
        return $this->belongsTo('App\Models\Province');
    }

    public function municipality(){
        return $this->belongsTo('App\Models\Municipality');
    }

    public function civilstatus(){
        return $this->belongsTo('App\Models\Civilstatus');
    }

    public function employmentstatus(){
        return $this->belongsTo('App\Models\Employmentstatus');
    }

    public function profession(){
        return $this->belongsTo('App\Models\Profession');
    }

    public function employer(){
        return $this->belongsTo('App\Models\Employer');
    }

    public function covidclass(){
        return $this->belongsTo('App\Models\Covidclass');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function idcard(){
        return $this->belongsTo('App\Models\Idcard');
    }

    public function vaccinator(){
        return $this->belongsTo('App\Models\Vaccinator');
    }

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }

    public function fullname(){
        return $this->lastname.", ".$this->firstname." ".$this->middlename." ".$this->suffixname;
    }

}
