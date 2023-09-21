<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class MarkAsAdoptedController extends Controller
{
    public function __invoke(Pet $pet)
    {
        $this->authorize('update', $pet);

        $pet->update(['is_adopted' => true]);

        toast(__('pets.updated'), 'success');

        return redirect()->back();
    }
}
