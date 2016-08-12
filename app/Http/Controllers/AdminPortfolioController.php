<?php

namespace App\Http\Controllers;

use App\PortfolioPhoto;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPortfolioController extends Controller
{

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
