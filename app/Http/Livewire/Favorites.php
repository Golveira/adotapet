<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Favorites extends Component
{
    use WithPagination;

    protected $listeners = ['refresh'];

    public function refresh()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pets = Pet::query()
            ->with(['media', 'city:id,title', 'state:id,letter'])
            ->favoritedBy(Auth::user()->id)
            ->latest()
            ->paginate(8);

        return view('livewire.favorites', compact('pets'));
    }
}
