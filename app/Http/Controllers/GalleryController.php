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
    	$photosession = Photosession::find($id);

		return view('client.pages.gallery', compact('photosession'));
    }
}
