<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Photo;
use App\PhotoSession;
use App\Http\Requests;
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
}