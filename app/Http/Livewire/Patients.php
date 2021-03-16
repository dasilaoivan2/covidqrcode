<?php

namespace App\Http\Livewire;

use App\Models\Barangay;
use App\Models\Category;
use App\Models\Civilstatus;
use App\Models\Covidclass;
use App\Models\Employmentstatus;
use App\Models\Idcard;
use App\Models\Municipality;
use App\Models\Patient;
use App\Models\Province;
use App\Models\Question;
use App\Models\Region;
use App\Models\Vaccinator;
use League\CommonMark\Block\Element\Paragraph;
use Livewire\Component;
use Livewire\WithPagination;

use SimpleSoftwareIO\QrCode\Generator;

use Auth;

class Patients extends Component
{
    use WithPagination;

    public $barangays,
        $provinces,
        $municipalities,
        $regions,
        $categories,
        $idcards,
        $vaccinators;

    public $patient_id, $question_id;

    public $category_id,
        $idcard_id,
        $id_no,
        $philhealth,
        $pwd,
        $firstname,
        $lastname,
        $middlename,
        $suffixname,
        $contact_no,
        $region_id = 1,
        $province_id = 1,
        $municipality_id = 1,
        $barangay_id,
        $sex,
        $birthday,
        $consent,
        $reason,
        $more_sixteen,
        $allergy_peg,
        $allergy_react,
        $allergy_food,
        $if_allergy_food,
        $history_bleeding,
        $if_history_bleeding,
        $manifest_symptoms,
        $if_manifest,
        $history_exp_covid,
        $treated_covid,
        $received_vaccine,
        $received_antibodies,
        $pregnant,
        $if_pregnant,
        $terminal_illness,
        $if_terminal_illness,
        $present_clearance,
        $deferral,
        $date_vaccinated,
        $time_vaccinated,
        $vaccine_manufacturer,
        $batch_no,
        $lot_no,
        $vaccinator_id,
        $first_dose,
        $second_dose,
        $sec_date_vaccinated,
        $sec_time_vaccinated,
        $sec_vaccine_manufacturer,
        $sec_batch_no,
        $sec_lot_no,
        $sec_vaccinator_id,
        $reference_no;

    public $print_patients;

    public $searchToken;

    public $confirming;

    public $isCreate = 0;


    public function render()
    {
        $user_id = Auth::user()->id;

        $this->barangays = Barangay::all();
        $this->municipalities = Municipality::all();
        $this->provinces = Province::all();
        $this->regions = Region::all();
        $this->categories = Category::all();
        $this->idcards = Idcard::all();
        $this->vaccinators = Vaccinator::all();
//        $this->print_patients = Patient::all()->where('print', '==', 1)->where('user_id', '==', $user_id);

        if ($user_id == 3) {

            $this->print_patients = Patient::all()->where('print', '==', 1);

            return view('livewire.patients', ['patients' => Patient::select('patients.*')->where('patients.lastname', 'LIKE', '%' . $this->searchToken . '%')
//            ->orWhere('patients.firstname', 'LIKE', '%' . $this->searchToken . '%')
//            ->orWhere('patients.middlename', 'LIKE', '%' . $this->searchToken . '%')
                ->orderBy('id', 'DESC')
                ->paginate(25)]);
        }
        else {

            $this->print_patients = Patient::all()->where('print', '==', 1)->where('user_id', '==', $user_id);

            return view('livewire.patients', ['patients' => Patient::select('patients.*')->where('patients.user_id', '=', $user_id)
                ->where('patients.lastname', 'LIKE', '%' . $this->searchToken . '%')
//            ->orWhere('patients.firstname', 'LIKE', '%' . $this->searchToken . '%')
//            ->orWhere('patients.middlename', 'LIKE', '%' . $this->searchToken . '%')
                ->orderBy('id', 'DESC')
                ->paginate(25)]);
        }

    }

    public function create()
    {
        $this->resetInputFields();
        $this->openCreate();
    }

    private function resetInputFields()
    {
        $this->category_id = '';
        $this->idcard_id = '';
        $this->id_no = '';
        $this->philhealth = '';
        $this->pwd = '';
        $this->firstname = '';
        $this->lastname = '';
        $this->middlename = '';
        $this->suffixname = '';
        $this->contact_no = '';
//        $this->region_id = '';
//        $this->province_id = '';
//        $this->municipality_id = '';
        $this->barangay_id = '';
        $this->sex = '';
        $this->birthday = '';
        $this->consent = '';
        $this->reason = '';
        $this->more_sixteen = '';
        $this->allergy_peg = '';
        $this->allergy_react = '';
        $this->allergy_food = '';
        $this->if_allergy_food = '';
        $this->history_bleeding = '';
        $this->if_history_bleeding = '';
        $this->manifest_symptoms = '';
        $this->if_manifest = '';
        $this->history_exp_covid = '';
        $this->treated_covid = '';
        $this->received_vaccine = '';
        $this->received_antibodies = '';
        $this->pregnant = '';
        $this->if_pregnant = '';
        $this->terminal_illness = '';
        $this->if_terminal_illness = '';
        $this->present_clearance = '';
        $this->deferral = '';
        $this->date_vaccinated = null;
        $this->time_vaccinated = null;
        $this->vaccine_manufacturer = '';
        $this->batch_no = '';
        $this->lot_no = '';
        $this->vaccinator_id = '';
        $this->first_dose = '';
        $this->second_dose = '';
        $this->confirming = '';
        $this->patient_id = '';
        $this->question_id = '';
        $this->sec_date_vaccinated = null;
        $this->sec_time_vaccinated = null;
        $this->sec_vaccine_manufacturer = '';
        $this->sec_batch_no = '';
        $this->sec_lot_no = '';
        $this->sec_vaccinator_id = '';
    }

    public function openCreate()
    {
        $this->isCreate = true;
    }

    public function closeCreate()
    {
        $this->isCreate = false;
    }

    private function generatecode()
    {
        $user_id = Auth::user()->id;
        $year = date('Y');
        $count = Patient::all()->count();
        $temp = $count + 1;

        if($count==0){
            $trailing ="000";
            $count = 1;
        }

        if($count<10 && $count>0){
            $trailing ="000";

        }

        if($count<100 && $count>10){
            $trailing ="00";
        }

        if($count<1000 && $count>100){
            $trailing ="0";
        }

        if($count>=1000){
            $trailing ="";
        }
        return $year."-".$trailing.$temp."-".$user_id;

    }

    public function store()
    {
        $this->validate([
            'category_id' => 'required',
            'idcard_id' => 'required',
            'id_no' => 'required',
//            'philhealth' => 'required',
//            'pwd' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
//            'suffixname' => 'required',
//            'contact_no' => 'required',
            'region_id' => 'required',
            'province_id' => 'required',
            'municipality_id' => 'required',
            'barangay_id' => 'required',
            'sex' => 'required',
            'birthday' => 'required'
//            'consent' => 'required',
//            'reason' => 'required',
//            'more_sixteen' => 'required',
//            'allergy_peg' => 'required',
//            'allergy_react' => 'required',
//            'allergy_food' => 'required',
//            'if_allergy_food' => 'required',
//            'history_bleeding' => 'required',
//            'if_history_bleeding' => 'required',
//            'manifest_symptoms' => 'required',
//            'if_manifest' => 'required',
//            'history_exp_covid' => 'required',
//            'treated_covid' => 'required',
//            'received_vaccine' => 'required',
//            'received_antibodies' => 'required',
//            'pregnant' => 'required',
//            'if_pregnant' => 'required',
//            'terminal_illness' => 'required',
//            'if_terminal_illness' => 'required',
//            'present_clearance' => 'required',
//            'deferral' => 'required',
//            'date_vaccinated' => 'required',
//            'time_vaccinated' => 'required',
//            'vaccine_manufacturer' => 'required',
//            'batch_no' => 'required',
//            'lot_no' => 'required',
//            'vaccinator_id' => 'required',
//            'first_dose' => 'required',
//            'second_dose' => 'required'

        ]);



        $user_id = Auth::user()->id;



        $question = Question::updateOrCreate(['id' => $this->question_id], [
            'more_sixteenyrs' => $this->more_sixteen,
            'has_no_peg_allergies' => $this->allergy_peg,
            'has_no_allergic_reaction_firstdose' => $this->allergy_react,
            'has_no_allergiy_to_food_no_asthma' => $this->allergy_food,
            'if_with_allergy_or_asthma' => $this->if_allergy_food,
            'has_no_history_of_bleeding_disorder' => $this->history_bleeding,
            'if_with_bleeding_disorder' => $this->if_history_bleeding,
            'does_not_manifest_symptoms' => $this->manifest_symptoms,
            'if_manifest' => $this->if_manifest,
            'has_no_history_of_exposure_covid' => $this->history_exp_covid,
            'not_been_treated_covid' => $this->treated_covid,
            'not_received_vaccine_twoweeks' => $this->received_vaccine,
            'not_received_plasma_antibodies' => $this->received_antibodies,
            'not_pregnant' => $this->pregnant,
            'if_pregnant' => $this->if_pregnant,
            'does_not_have_terminal_illness' => $this->terminal_illness,
            'if_with_illness_specify' => $this->if_terminal_illness,
            'if_with_illness_has_presented_clearance' => $this->present_clearance,
        ]);


        Patient::updateOrCreate(['id' => $this->patient_id], [
            'category_id' => $this->category_id,
            'idcard_id' => $this->idcard_id,
            'id_no' => $this->id_no,
            'philhealth' => $this->philhealth,
            'pwd' => $this->pwd,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'suffixname' => $this->suffixname,
            'contact_no' => $this->contact_no,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'municipality_id' => $this->municipality_id,
            'barangay_id' => $this->barangay_id,
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'consent' => $this->consent,
            'reason' => $this->reason,
//            'more_sixteenyrs' => $this->more_sixteen,
//            'has_no_peg_allergies' => $this->allergy_peg,
//            'has_no_allergic_reaction_firstdose' => $this->allergy_react,
//            'has_no_allergiy_to_food_no_asthma' => $this->allergy_food,
//            'if_with_allergy_or_asthma' => $this->if_allergy_food,
//            'has_no_history_of_bleeding_disorder' => $this->history_bleeding,
//            'if_with_bleeding_disorder' => $this->if_history_bleeding,
//            'does_not_manifest_symptoms' => $this->manifest_symptoms,
//            'if_manifest' => $this->if_manifest,
//            'has_no_history_of_exposure_covid' => $this->history_exp_covid,
//            'not_been_treated_covid' => $this->treated_covid,
//            'not_received_vaccine_twoweeks' => $this->received_vaccine,
//            'not_received_plasma_antibodies' => $this->received_antibodies,
//            'not_pregnant' => $this->pregnant,
//            'if_pregnant' => $this->if_pregnant,
//            'does_not_have_terminal_illness' => $this->terminal_illness,
//            'if_with_illness_specify' => $this->if_terminal_illness,
//            'if_with_illness_has_presented_clearance' => $this->present_clearance,
            'question_id' => $question->id,
            'deferral' => $this->deferral,
            'date_vaccinated' => $this->date_vaccinated,
            'time_vaccinated' => $this->time_vaccinated,
            'vaccine_manufacturer' => $this->vaccine_manufacturer,
            'batch_no' => $this->batch_no,
            'lot_no' => $this->lot_no,
            'vaccinator_id' => $this->vaccinator_id,
            'first_dose' => $this->first_dose,
            'second_dose' => $this->second_dose,
            'sec_date_vaccinated' => $this->sec_date_vaccinated,
            'sec_time_vaccinated' => $this->sec_time_vaccinated,
            'sec_vaccine_manufacturer' => $this->sec_vaccine_manufacturer,
            'sec_batch_no' => $this->sec_batch_no,
            'sec_lot_no' => $this->sec_lot_no,
            'sec_vaccinator_id' => $this->sec_vaccinator_id,
            'reference_no' => $this->generatecode(),
            'user_id' => $user_id
        ]);

        session()->flash('message',
            $this->patient_id ? 'Patient Updated Successfully.' : 'Patient Created Successfully.');
        $this->closeCreate();
        $this->patients = Patient::all()->where('user_id', '==', $user_id);
        $this->resetInputFields();

    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $question = Question::findOrFail($patient->question_id);

        $this->patient_id = $id;
        $this->question_id = $patient->question_id;

        $this->category_id = $patient->category_id;
        $this->idcard_id = $patient->idcard_id;
        $this->id_no = $patient->id_no;
        $this->philhealth = $patient->philhealth;
        $this->pwd = $patient->pwd;
        $this->firstname = $patient->firstname;
        $this->lastname = $patient->lastname;
        $this->middlename = $patient->middlename;
        $this->suffixname = $patient->suffixname;
        $this->contact_no = $patient->contact_no;
        $this->region_id = $patient->region_id;
        $this->province_id = $patient->province_id;
        $this->municipality_id = $patient->municipality_id;
        $this->barangay_id = $patient->barangay_id;
        $this->sex = $patient->sex;
        $this->birthday = $patient->birthday;
        $this->consent = $patient->consent;
        $this->reason = $patient->reason;
        $this->more_sixteen = $question->more_sixteenyrs;
        $this->allergy_peg = $question->has_no_peg_allergies;
        $this->allergy_react = $question->has_no_allergic_reaction_firstdose;
        $this->allergy_food = $question->has_no_allergiy_to_food_no_asthma;
        $this->if_allergy_food = $question->if_with_allergy_or_asthma;
        $this->history_bleeding = $question->has_no_history_of_bleeding_disorder;
        $this->if_history_bleeding = $question->if_with_bleeding_disorder;
        $this->manifest_symptoms = $question->does_not_manifest_symptoms;
        $this->if_manifest = $question->if_manifest;
        $this->history_exp_covid = $question->has_no_history_of_exposure_covid;
        $this->treated_covid = $question->not_been_treated_covid;
        $this->received_vaccine = $question->not_received_vaccine_twoweeks;
        $this->received_antibodies = $question->not_received_plasma_antibodies;
        $this->pregnant = $question->not_pregnant;
        $this->if_pregnant = $question->if_pregnant;
        $this->terminal_illness = $question->does_not_have_terminal_illness;
        $this->if_terminal_illness = $question->if_with_illness_specify;
        $this->present_clearance = $question->if_with_illness_has_presented_clearance;
        $this->deferral = $patient->deferral;
        $this->date_vaccinated = $patient->date_vaccinated;
        $this->time_vaccinated = $patient->time_vaccinated;
        $this->vaccine_manufacturer = $patient->vaccine_manufacturer;
        $this->batch_no = $patient->batch_no;
        $this->lot_no = $patient->lot_no;
        $this->vaccinator_id = $patient->vaccinator_id;
        $this->first_dose = $patient->first_dose;
        $this->second_dose = $patient->second_dose;
        $this->sec_date_vaccinated = $patient->sec_date_vaccinated;
        $this->sec_time_vaccinated = $patient->sec_time_vaccinated;
        $this->sec_vaccine_manufacturer = $patient->sec_vaccine_manufacturer;
        $this->sec_batch_no = $patient->sec_batch_no;
        $this->sec_lot_no = $patient->sec_lot_no;
        $this->sec_vaccinator_id = $patient->sec_vaccinator_id;


        $this->confirming = '';
        $this->openCreate();


    }

    public function updatePrint($id, $checker)
    {
        $patient = Patient::find($id);

        if ($checker) {
            $patient->print = 0;
            $patient->save();
        } else {
            $patient->print = 1;
            $patient->save();
        }
    }

    public function delete($id)
    {
        Patient::find($id)->delete();
        session()->flash('message', 'Patient Deleted Successfully.');
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        $user_id = Auth::user()->id;

        $patient = Patient::find($id);

        $ques_id = $patient->question_id;

        Patient::find($id)->delete();
        Question::find($ques_id)->delete();

        session()->flash('message', 'Patient Deleted Successfully.');
        $this->patients = Patient::all()->where('user_id', '==', $user_id);
    }

    public function clearPrintable()
    {
        $user_id = Auth::user()->id;

        $patients = Patient::all()->where('user_id', '==', $user_id);

        foreach ($patients as $patient) {
            $patient->print = 0;
            $patient->save();
        }
    }

//    public function print(){
//
////        $user_id = Auth::user()->id;
////
////        $patients = Patient::all()->where('print','==', 1)->where('user_id', '==', $user_id);
//
//        return redirect(route('prints'));
//
//    }


}
