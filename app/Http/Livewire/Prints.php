<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use Auth;

class Prints extends Component
{
    public function render()
    {
//        $user_id = Auth::user()->id;
//
//        $patients = Patient::all()->where('print','==', 1)->where('user_id', '==', $user_id);
//
//        return view('livewire.prints', compact('patients'));
    }
}
