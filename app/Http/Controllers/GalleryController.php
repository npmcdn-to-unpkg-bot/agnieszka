<?php

namespace App\Http\Controllers;

use App\User;
use App\PhotoSession;
use App\Http\Requests;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function __construct() {
       $this->middleware('auth');
  	}

    public function showGallery($id)
    {
    	$photosession = Photosession::find($id);

		return view('client.pages.gallery', compact('photosession'));
    }

    public function showClientDashboard($id)
    {
    	$user = User::findOrFail($id);

		return view('client.pages.dashboard', compact('user'));
    }
}
