<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordController extends Controller
{
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $request->user()->update(['password' => Hash::make($request->password)]);

        toast(__('passwords.updated'), 'success');

        return back();
    }
}
