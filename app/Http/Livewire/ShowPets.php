<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPets extends Component
{
    use WithPagination;

    public $specie = '';
    public $sex = '';
    public $age = '';
    public $size = '';
    private $pets;

    public function filterPets()
    {
    }

    public function render()
    {
        $pets = Pet::where('specie', 'like', '%' . $this->specie . '%')
            ->where('sex', 'like', '%' . $this->sex . '%')
            ->where('age', 'like', '%' . $this->age . '%')
            ->where('size', 'like', '%' . $this->size . '%')
            ->paginate(20);

        return view('livewire.show-pets', compact('pets'));
    }
}