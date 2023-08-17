<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PetImages extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public Pet $pet;

    public $photos = [];

    protected $listeners = ['delete', 'refresh' => '$refresh'];

    protected $rules = [
        'photos' => 'array|max:8',
        'photos.*' => 'image|max:1024',
    ];

    protected $messages = [
        'photos.*.max' => 'The photo may not be greater than 1 MB.',
        'photos.*.image' => 'The file must be an image.',
    ];

    public function mount($pet)
    {
        $this->pet = $pet;
    }

    public function updatedPhotos()
    {
        $this->authorize('update', $this->pet);

        $this->validate();

        foreach ($this->photos as $photo) {
            $this->pet
                ->addMedia($photo->getRealPath())
                ->usingName($photo->getClientOriginalName())
                ->toMediaCollection('pets-gallery');
        }

        $this->emit('refresh');
    }

    public function delete($id)
    {
        $this->authorize('delete', $this->pet);

        $this->pet->deleteMedia($id);

        $this->emit('refresh');
    }

    public function render()
    {
        $images = $this->pet->getMedia('pets-gallery');

        return view('livewire.pet-images', compact('images'));
    }
}