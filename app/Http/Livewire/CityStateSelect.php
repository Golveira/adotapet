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

    public function mount()
    {
        $this->states = State::all();

        $this->cities = collect();
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
