<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use App\PhotoSession;
use App\Http\Requests;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function __construct() {
       $this->middleware('auth');
  	}

    public function showGallery($id, $photosession)
    {
    	$user = User::findOrFail($id);
        $photosession = Photosession::findOrFail($photosession);

		return view('client.pages.gallery', compact(['photosession', 'user']));
    }

    public function showClientDashboard($id)
    {
    	$user = User::findOrFail($id);

		return view('client.pages.dashboard', compact('user'));
    }

    public function sendPhotoRequest(Request $request)
    {
           
        foreach ($request->request_photo as $photo_id) {

            $photo = Photo::findOrFail($photo_id);

            $photo->selected = true;

            $photo->save();
        }

        flash()->overlay('Congratulations! :)', 'You have successfully submitted your selected photos! You will soon receive an email containing the download link to your photos!');
        return redirect()->back();
    }
}
