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
