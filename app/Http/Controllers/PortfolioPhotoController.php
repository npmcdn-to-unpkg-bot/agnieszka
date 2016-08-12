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
        $categories = ['family', 'newborn', 'maternity', 'engagement', 'artistic'];

        return view('pages.portfolio', compact(['photos','categories']));
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

        flash()->success('Congrats', 'You have successfully uploaded the photos to $category!');
    }
}
