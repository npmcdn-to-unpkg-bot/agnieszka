<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioPhoto;

use App\Http\Requests\PhotoRequest;

class PortfolioPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio_photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function addPhoto(Request $request, $category)
    {
        // dd($request->file('file'));
        // flash()->overlay('Welcome Abord!', 'Your photo has been created!');
        // $this->validate($request, [
        //     'photo' => 'required|mime:jpg,jpeg,png,bmp'
        // ]);

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();

        $file->move('images/portfolio_photos', $name);

        PortfolioPhoto::create([
            'path' => "/images/portfolio_photos/{$name}",
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $portfolio_photos = PortfolioPhoto::all();

        return view('portfolio_photos.show', compact('portfolio_photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
