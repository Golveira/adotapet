<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PasswordUpdateController extends Controller
{
    public function edit(): View
    {
        return view('settings.password.edit');
    }

    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        toast(__('passwords.updated'), 'success');

        return back();
    }
}