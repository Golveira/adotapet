<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class ModalDelete extends ModalComponent
{
    public int $modelId;

    public string $route;

    public string $confirmationTitle;

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modal-delete');
    }
}
