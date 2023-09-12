<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;

class UserSelect extends Component
{
    public Collection $users;
    public ?User $selectedUser;
    public string $search;

    public function updatedSearch($search)
    {
        if (strlen($search) < 2) {
            $this->users = collect();
            return;
        }

        $this->users = User::query()
            ->where('name', 'like', "%{$search}%")
            ->orderBy('name')
            ->limit(20)
            ->get(['id', 'name']);
    }

    public function selectUser($id)
    {
        $this->selectedUser = User::find($id);

        $this->clear();
    }

    public function clear()
    {
        $this->search = '';

        $this->users = collect();
    }

    public function resetSelect()
    {
        $this->selectedUser = null;

        $this->clear();
    }

    public function render()
    {
        return view('livewire.user-select');
    }
}
