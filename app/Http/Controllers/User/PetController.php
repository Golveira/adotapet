<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PetController extends Controller
{
    public function index(): View
    {
        return view('pets.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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