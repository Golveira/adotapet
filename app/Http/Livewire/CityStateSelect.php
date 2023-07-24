<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\State;
use Livewire\Component;

class CityStateSelect extends Component
{
    public $stateId;

    public $cityId;

    public $states;

    public $cities;

    public function mount($stateId = null, $cityId = null)
    {
        $this->stateId = $stateId;

        $this->cityId = $cityId;

        $this->states = State::all();

        $this->cities = City::where('state_id', $stateId)->get();
    }

    public function updatedStateId($stateId)
    {
        $this->cities = City::where('state_id', $stateId)->get();
    }

    public function render()
    {
        return view('livewire.city-state-select');
    }
}
