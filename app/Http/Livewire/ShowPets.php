<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Pet;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPets extends Component
{
    use WithPagination;

    public $specie = '';

    public $sex = '';

    public $age = '';

    public $size = '';

    public $name = '';

    public $stateId;

    public $cityId;

    public $states;

    public $cities;

    public function mount()
    {
        $this->states = State::all();

        $this->cities = collect();
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function updatedStateId($stateId)
    {
        $this->cities = City::where('state_id', $stateId)->get();
    }

    public function render()
    {
        $pets = Pet::with(['media', 'city', 'state'])
            ->where('name', 'like', '%' . $this->name . '%')
            ->where('specie', 'like', '%' . $this->specie . '%')
            ->where('age', 'like', '%' . $this->age . '%')
            ->where('size', 'like', '%' . $this->size . '%')
            ->when($this->sex, function ($query, $sex) {
                return $query->where('sex', $sex);
            })
            ->when($this->stateId, function ($query, $stateId) {
                return $query->where('state_id', $stateId);
            })
            ->when($this->cityId, function ($query, $cityId) {
                return $query->where('city_id', $cityId);
            })
            ->paginate(18);

        return view('livewire.show-pets', compact('pets'));
    }
}