<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Pet;
use App\Services\PetService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PetController extends Controller
{
    public function __construct(private PetService $petService)
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
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
        $this->petService->store($request->validated());

        toast(__('pets.created'), 'success');

        return redirect()->route('profile.show', Auth::user()->username);
    }

    public function show(Pet $pet): View
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $this->authorize('update', $pet);

        return view('pets.edit', compact('pet'));
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $this->authorize('update', $pet);

        $this->petService->update($pet, $request->validated());

        toast(__('pets.updated'), 'success');

        return redirect()->route('profile.show', Auth::user()->username);
    }

    public function destroy(Pet $pet)
    {
        $this->authorize('delete', $pet);

        $pet->delete();

        toast(__('pets.deleted'), 'success');

        return redirect()->route('profile.show', Auth::user()->username);
    }
}
