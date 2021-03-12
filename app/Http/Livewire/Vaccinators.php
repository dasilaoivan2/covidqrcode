<?php

namespace App\Http\Livewire;

use App\Models\Vaccinator;
use Livewire\Component;
use Livewire\WithPagination;

class Vaccinators extends Component
{
    use WithPagination;

    public $firstname, $lastname, $middlename, $profession, $vaccinator_id;

    public $searchToken;

    public $confirming;

    public $isOpen = 0;

    public function render()
    {
        return view('livewire.vaccinators', ['vaccinators' => Vaccinator::select('vaccinators.*')->where('vaccinators.firstname', 'LIKE', '%' . $this->searchToken . '%')
            ->orWhere('vaccinators.middlename', 'LIKE', '%' . $this->searchToken . '%')
            ->orWhere('vaccinators.lastname', 'LIKE', '%' . $this->searchToken . '%')
            ->paginate(25)]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    private function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->middlename = '';
        $this->profession = '';
        $this->vaccinator_id = '';
        $this->confirming = '';
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'profession' => 'required'

        ]);

        Vaccinator::updateOrCreate(['id' => $this->vaccinator_id], [
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'profession' => $this->profession
        ]);

        session()->flash('message',
            $this->vaccinator_id ? 'Vaccinator Updated Successfully.' : 'Vaccinator Created Successfully.');
        $this->closeModal();
        $this->vaccinators = Vaccinator::all();
        $this->resetInputFields();

    }

    public function edit($id)
    {
        $vaccinator = Vaccinator::findOrFail($id);
        $this->vaccinator_id = $id;
        $this->lastname = $vaccinator->lastname;
        $this->firstname = $vaccinator->firstname;
        $this->middlename = $vaccinator->middlename;
        $this->profession = $vaccinator->profession;
        $this->confirming = '';
        $this->openModal();
    }

    public function delete($id)
    {
        Vaccinator::find($id)->delete();
        session()->flash('message', 'Vaccinator Deleted Successfully.');
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Vaccinator::find($id)->delete();
        session()->flash('message', 'Vaccinator Deleted Successfully.');
        $this->vaccinators = Vaccinator::all();
    }
}
