<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

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
