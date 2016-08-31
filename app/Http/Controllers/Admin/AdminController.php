<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\PhotoSession;
use App\Http\Requests;
use App\PortfolioPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function dashboard()
	{
		$photosessions = Photosession::with('photos', 'user')->get();
		$users = User::all();

		return view('admin.pages.dashboard', compact([
			'photosessions',
			'users'
		]));
	}

	public function clients()
	{
		$users = User::all();

		return view('admin.pages.clients', compact('users'));
	}

	//Add photo(s) to the Database
    public function addPhoto($category, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        // $request->file('photo') is same as Dropzone's option paramName
        PortfolioPhoto::fromForm($category, $request->file('photo'));
        flash()->success('Congrats', 'You have successfully uploaded the photos to $category!');
        return redirect()->back();
    }
}