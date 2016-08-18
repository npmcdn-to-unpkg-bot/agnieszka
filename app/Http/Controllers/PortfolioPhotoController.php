<?php

namespace App\Http\Controllers;

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

        return view('pages.portfolio', compact(['photos']));
    }
}
