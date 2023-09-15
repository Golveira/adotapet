<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdatePetRequest;
use App\Models\Pet;
use Illuminate\View\View;
use App\Services\PetService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\StorePetRequest;

class PetController extends Controller
{
    public function __construct(private PetService $petService)
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(): View
    {
        return view('pets.index');
    }

    public function create(): View
    {
        return view('pets.create');
    }

    public function store(StorePetRequest $request): RedirectResponse
    {
        $this->petService->store(
            $request->validated(),
            $request->file('photo'),
            Auth::user()->id
        );

        toast(__('pets.created'), 'success');

        return redirect()
            ->route('profile.show', Auth::user()->username);
    }

    public function show(Pet $pet): View
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $this->authorize('update', $pet);

        $veterinaryCares = $pet->veterinaryCares()
            ->pluck('veterinary_care_id')
            ->toArray();

        $temperaments = $pet->temperaments()
            ->pluck('temperament_id')
            ->toArray();

        $sociabilities = $pet->sociabilities()
            ->pluck('sociability_id')
            ->toArray();

        return view('pets.edit', compact('pet', 'veterinaryCares', 'temperaments', 'sociabilities'));
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $this->authorize('update', $pet);

        $this->petService->update(
            $pet,
            $request->validated(),
            $request->file('photo')
        );

        toast(__('pets.updated'), 'success');

        return redirect()
            ->route('profile.show', Auth::user()->username);
    }

    public function destroy(Pet $pet)
    {
        $this->authorize('delete', $pet);

        $pet->delete();

        toast(__('pets.deleted'), 'success');

        return redirect()
            ->route('profile.show', Auth::user()->username);
    }
}
