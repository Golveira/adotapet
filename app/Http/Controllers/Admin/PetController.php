<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pet;
use Illuminate\View\View;
use App\Services\PetService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use Illuminate\Http\RedirectResponse;

class PetController extends Controller
{
    public function __construct(private PetService $petService)
    {
    }

    public function index(): View
    {
        return view('admin.pets.index');
    }

    public function create(): View
    {
        return view('admin.pets.create');
    }

    public function store(StorePetRequest $request): RedirectResponse
    {
        $this->petService->store($request->validated());

        toast(__('pets.created'), 'success');

        return redirect()->route('admin.pets.index');
    }

    public function show(Pet $pet)
    {
        return view('admin.pets.show', compact('pet'));
    }

    public function edit(Pet $pet): View
    {
        return view('admin.pets.edit', compact('pet'));
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $this->petService->update($pet, $request->validated());

        toast(__('pets.updated'), 'success');

        return redirect()->route('admin.pets.index');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        toast(__('pets.deleted'), 'success');

        return redirect()->route('admin.pets.index');
    }
}
