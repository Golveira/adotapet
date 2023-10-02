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

    public function getStateProperty()
    {
        return State::find($this->filters['stateId']);
    }

    public function getCityProperty()
    {
        return City::find($this->filters['cityId']);
    }

    public function displayFilter($key, $value)
    {
        if ($key === 'stateId') {
            return $this->state->letter;
        }

        if ($key === 'cityId') {
            return $this->city->title;
        }

        return $value;
    }

    public function hasFilters()
    {
        return ! empty($this->getFilters());
    }

    public function getFilters()
    {
        return array_filter($this->filters, fn ($filter) => $filter !== '');
    }

    public function clearFilter($filter)
    {
        $this->filters[$filter] = '';
    }

    public function clearAllFilters()
    {
        $this->reset('filters');
    }

    public function render()
    {
        $filters = ['userId' => $this->userId, ...$this->filters];

        $pets = Pet::query()
            ->with(['media', 'city:id,title', 'state:id,letter'])
            ->filter($filters)
            ->latest()
            ->paginate(18);

        return view('livewire.show-pets', compact('pets'));
    }
}
