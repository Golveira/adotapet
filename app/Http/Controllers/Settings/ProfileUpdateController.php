<?php

namespace App\Http\Controllers\Settings;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileUpdateController extends Controller
{
    public function __construct(private ProfileService $profileService)
    {
    }

    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('settings.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $this->profileService->update(
            $request->validated(),
            $request->file('avatar'),
            $request->user()
        );

        toast(__('profile.updated'), 'success');

        return redirect()->back();
    }
}