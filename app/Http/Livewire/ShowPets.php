<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\City;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowPets extends Component
{
    use WithPagination;

    public $filters = [
        'name' => '',
        'specie' => '',
        'sex' => '',
        'age' => '',
        'size' => '',
        'stateId' => '',
        'cityId' => '',
    ];

    public $userId;

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

    public function updatedFiltersStateId($stateId)
    {
        $this->cities = City::query()
            ->where('state_id', $stateId)
            ->get(['id', 'title']);
    }

    public function render()
    {
        $filters = ['userId' => $this->userId, ...$this->filters];

        $pets = Pet::query()
            ->with(['media', 'city:id,title', 'state:id,letter'])
            ->filter($filters)
            ->paginate(18);

        return view('livewire.show-pets', compact('pets'));
    }
}