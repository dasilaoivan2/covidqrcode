<?php

namespace App\Http\Livewire;


use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class Regions extends Component
{
    use WithPagination;

    public $region_id, $name;

    public $searchToken;

    public $confirming;

    public $isOpen = 0;

    public function render()
    {
        return view('livewire.regions', ['regions' => Region::select('regions.*')->where('regions.name', 'LIKE', '%' . $this->searchToken . '%')
            ->paginate(25)]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->region_id = '';
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
            'name' => 'required',
        ]);

        Region::updateOrCreate(['id' => $this->region_id], [
            'name' => $this->name
        ]);

        session()->flash('message',
            $this->region_id ? 'Region Updated Successfully.' : 'Region Created Successfully.');
        $this->closeModal();
        $this->regions = Region::all();
        $this->resetInputFields();

    }

    public function edit($id)
    {
        $region = Region::findOrFail($id);
        $this->region_id = $id;
        $this->name = $region->name;
        $this->confirming = '';
        $this->openModal();
    }

    public function delete($id)
    {
        Region::find($id)->delete();
        session()->flash('message', 'Region Deleted Successfully.');
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Region::find($id)->delete();
        session()->flash('message', 'Region Deleted Successfully.');
        $this->regions = Region::all();
    }
}
