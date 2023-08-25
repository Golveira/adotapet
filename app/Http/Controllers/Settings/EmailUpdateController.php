<?php

namespace App\Http\Controllers\Settings;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateEmailRequest;

class EmailUpdateController extends Controller
{
    public function edit(Request $request): View
    {
        return view('settings.email.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(UpdateEmailRequest $request): RedirectResponse
    {
        $request->user()->update([
            'email' => $request->email
        ]);

        toast(__('emails.updated'), 'success');

        return redirect()->back();
    }
}