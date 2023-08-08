<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PetCard extends Component
{
    public $pet;

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
    }

    public function toggleBookmark()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }

        Auth::user()->toggleBookmark($this->pet);

        $this->emitUp('refresh');
    }

    public function render()
    {
        $isBookmarked = Auth::user()?->hasBookmarked($this->pet);

        return view('livewire.pet-card', compact('isBookmarked'));
    }
}