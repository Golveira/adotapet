<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteButton extends Component
{
    public Pet $pet;

    public bool $isFavorite;

    public string $classes;

    public bool $withOverlay;

    public function mount(Pet $pet, bool $withOverlay = false, string $classes = '')
    {
        $this->pet = $pet;

        $this->isFavorite = Auth::user()?->hasFavorited($this->pet) ?? false;

        $this->classes = $classes;

        $this->withOverlay = $withOverlay;
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Auth::user()->toggleFavorite($this->pet);

        $this->isFavorite = !$this->isFavorite;;

        $this->emitUp('refresh');
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
