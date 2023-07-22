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

    public $userId;

    public $specie = '';

    public $sex = '';

    public $age = '';

    public $size = '';

    public $name = '';

    public $stateId;

    public $cityId;

    public $states;

    public $cities;

    public function mount($userId = null)
    {
        $this->userId = $userId;

        $this->states = State::get(['id', 'title']);

        $this->cities = collect();
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function updatedStateId($stateId)
    {
        $this->cities = City::where('state_id', $stateId)->get(['id', 'title']);
    }

    public function render()
    {
        $pets = Pet::with(['media', 'city:id,title', 'state:id,letter'])
            ->where('name', 'like', '%' . $this->name . '%')
            ->where('specie', 'like', '%' . $this->specie . '%')
            ->where('age', 'like', '%' . $this->age . '%')
            ->where('size', 'like', '%' . $this->size . '%')
            ->when($this->userId, function ($query, $userId) {
                return $query->where('user_id', $userId);
            })
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