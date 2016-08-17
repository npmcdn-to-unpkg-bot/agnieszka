<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosessionPhotoController extends Controller
{
    public function destroy($id)
    {
    	Photo::findOrFail($id)->delete();

    	return back();
    }
}
