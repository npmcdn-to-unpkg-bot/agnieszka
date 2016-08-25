<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\PortfolioPhoto;
use Illuminate\Http\Request;

class PortfolioPhotoController extends Controller
{
	/**
     * Display the specified resource.
     */
    public function showAll()
    {
        $photos = PortfolioPhoto::all();

        return view('pages.portfolio', compact(['photos']));
    }

    public function destroy($id)
    {
    	PortfolioPhoto::findOrFail($id)->delete();

    	return back();
    }
}
