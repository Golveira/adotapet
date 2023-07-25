<?php

namespace App\Http\Controllers\User;

use App\Models\Pet;
use Illuminate\View\View;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Services\PetService;
use Illuminate\Http\Request;
use App\Models\VeterinaryCare;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $veterinaryCares = VeterinaryCare::get(['id', 'name']);
        $sociabilities = Sociability::get(['id', 'name']);
        $temperaments = Temperament::get(['id', 'name']);

        return view('pets.create', compact('veterinaryCares', 'sociabilities', 'temperaments'));
    }

    public function store(StorePetRequest $request)
    {
        $this->petService->store(
            $request->validated(),
            $request->file('photo'),
            Auth::user()->id
        );

        toast(__('pets.created'), 'success');

        return redirect()->route('pets.index');
    }

    public function show(Pet $pet): View
    {
        $pet->load(
            'user:id,name,username',
            'city:id,title',
            'state:id,letter',
            'sociabilities:id,name',
            'temperaments:id,name',
            'veterinaryCares:id,name'
        );

        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}