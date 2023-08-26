<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AvatarUpload extends Component
{
    use WithFileUploads;

    public $user;

    public $avatar;

    protected $rules = [
        'avatar' => 'image|max:1024',
    ];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function updatedAvatar($avatar)
    {
        $this->validate();

        $this->user
            ->addMedia($avatar)
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