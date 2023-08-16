<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\City;
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

    public function getNotEmptyFilters()
    {
        return array_filter($this->filters, fn($filter) => $filter !== '');
    }

    public function filtersNotEmpty()
    {
        return !empty($this->getNotEmptyFilters());
    }

    public function clearFilter($filter)
    {
        $this->filters[$filter] = '';
    }

    public function clearAll()
    {
        $this->reset('filters');
    }

    public function render()
    {
        $filters = ['userId' => $this->userId, ...$this->filters];

        $pets = Pet::query()
            ->when(!$this->userId, function ($query, $userId) {
                $query->approved();
            })
            ->with(['media', 'city:id,title', 'state:id,letter'])
            ->filter($filters)
            ->latest()
            ->paginate(18);

        return view('livewire.show-pets', compact('pets'));
    }
}