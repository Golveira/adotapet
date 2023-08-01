<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Bookmark extends Component
{
    public Pet $pet;

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
    }

    public function toggleBookmark()
    {
        $user = Auth::user();

        if ($user->isBookmarked($this->pet)) {
            $user->unbookmark($this->pet);
            $this->pet->is_bookmarked = false;

        } else {
            $user->bookmark($this->pet);
            $this->pet->is_bookmarked = true;
        }
    }

    public function render()
    {
        return view('livewire.bookmark');
    }
}