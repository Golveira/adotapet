<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;

class PetCard extends Component
{
    public Pet $pet;

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
    }

    public function render()
    {
        return view('livewire.pet-card');
    }
}
