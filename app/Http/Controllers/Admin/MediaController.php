<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function destroy(Media $media): RedirectResponse
    {
        $media->delete();

        toast(__('media.deleted'), 'success');

        return redirect()->back();
    }
}
