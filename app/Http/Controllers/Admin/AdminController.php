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
		$photosessions = Photosession::count();
		$ordered = Photosession::where('ordered', true)->count();
		$awaiting_orders = Photosession::where('ordered', false)->count();
		$purchased = Photosession::where('purchased', true)->count();
		$admins = User::withCount('roles')->count();
		$clients = User::count() - $admins;

		return view('admin.pages.dashboard', compact([
			'photosessions',
			'ordered',
			'awaiting_orders',
			'purchased',
			'clients'
		]));
	}

	public function clients()
	{
		$clients = User::has('photosessions')->get();
		return view('admin.pages.clients', compact('clients'));
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