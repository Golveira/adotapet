<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteButton extends Component
{
    public Pet $pet;

    public ?User $user;

    public bool $isFavorite;

    public function mount(Pet $pet)
    {
        $this->pet = $pet;

        $this->user = Auth::user();

        $this->isFavorite = $this->user?->hasFavorited($this->pet);
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->user->toggleFavorite($this->pet);

        $this->isFavorite = !$this->isFavorite;;
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
