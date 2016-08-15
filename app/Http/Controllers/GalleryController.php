<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Photo;
use App\PhotoSession;
use App\Http\Requests;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
		dd($user->photosessions);
        return view('client.pages.gallery', compact($user));
    }
}
