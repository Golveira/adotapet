<?php

namespace App\Http\Controllers\Pet;

use App\Models\Pet;
use App\Http\Controllers\Controller;

class MarkAsAvailableController extends Controller
{
    public function __invoke(Pet $pet)
    {
        $this->authorize('update', $pet);

        $pet->update(['is_adopted' => false]);

        toast(__('pets.updated'), 'success');

        return redirect()->back();
    }
}
