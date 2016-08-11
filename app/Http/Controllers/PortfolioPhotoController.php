<?php

namespace App\Http\Controllers;

use App\Category;
use App\PortfolioPhoto;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioPhotoController extends Controller
{
	/**
     * Display the specified resource.
     */
    public function showAll()
    {
        $photos = PortfolioPhoto::all();
        return view('pages.portfolio', compact('photos'));
    }

	public function addPhoto($category, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $file = $request->file('photo'); //Same as Dropzone's optional paramName
        $name = time() . $file->getClientOriginalName();

        $file->move('images/portfolio_photos', $name);

        PortfolioPhoto::create([
            'path' => "/images/portfolio_photos/{$name}",
            'category' => $category
        ]);

        // flash()->overlay('Welcome Abord!', 'Your photo has been created!');
    }

    // public function family()
    // {
    //     $photos = PortfolioPhoto::all();
    //     $familyPhotos = Category::where('name', '=', 'family')->get();

    //    return $familyPhotos;
    // }
}
