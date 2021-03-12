<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    //from database table - column name
    protected $fillable = ['more_sixteenyrs',
        'has_no_peg_allergies',
        'has_no_allergic_reaction_firstdose',
        'has_no_allergiy_to_food_no_asthma',
        'if_with_allergy_or_asthma',
        'has_no_history_of_bleeding_disorder',
        'if_with_bleeding_disorder',
        'does_not_manifest_symptoms',
        'if_manifest',
        'has_no_history_of_exposure_covid',
        'not_been_treated_covid',
        'not_received_vaccine_twoweeks',
        'not_received_plasma_antibodies',
        'not_pregnant',
        'if_pregnant',
        'does_not_have_terminal_illness',
        'if_with_illness_specify',
        'if_with_illness_has_presented_clearance'
    ];

    public function patient(){
        return $this->hasOne('App\Models\Patient');
    }
}
