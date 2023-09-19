<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function __construct(private ProfileService $profileService)
    {
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $this->profileService->update($request->user(), $request->validated());

        toast(__('profile.updated'), 'success');

        return redirect()->back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast(__('profile.deleted'), 'success');

        return redirect()->route('welcome');
    }
}
