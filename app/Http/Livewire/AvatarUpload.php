<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AvatarUpload extends Component
{
    use WithFileUploads;

    public $user;

    public $photo;

    protected $rules = [
        'photo' => 'image|max:2048',
    ];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function updatedPhoto($photo)
    {
        $this->validate();

        $this->user
            ->addMedia($photo)
            ->toMediaCollection('avatars');

        $this->emit('refresh');
    }

    public function removeAvatar()
    {
        $this->user->clearMediaCollection('avatars');
    }

    public function render()
    {
        return view('livewire.avatar-upload');
    }
}