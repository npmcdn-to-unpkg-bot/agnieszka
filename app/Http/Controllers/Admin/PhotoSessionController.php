<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\User;
use App\Photo;
use App\PhotoSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoSessionRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotoSessionController extends Controller
{
    protected $backgroundsBaseDir = 'images/photosessions/backgrounds';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photosessions = PhotoSession::all();

        return view('admin.pages.photosessions', compact('photosessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoSessionRequest $request)
    {
        $user = User::findOrFail($request->client);

        $photosession = PhotoSession::create([
            'user_id' => $request->client,
            'title' => $request->title,
            'category' => $request->category,
            'date_of_photosession' => $request->date_of_photosession
        ]);

        $user->photosessions()->save($photosession);

        flash()->success('Nice one! :)', 'You have successfully created a new photo session!');
        return redirect('/admin/photosessions/' . $photosession->id . '/edit');
    }

    //Add background image to the Database
    public function addBackgroundImage($id, Request $request)
    {
        $this->validate($request, [
            'background' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        
        $file = $request->file('background');
        $name = time() . $file->getClientOriginalName();
        $file->move($this->backgroundsBaseDir, $name);

        //Find the photo session
        $photosession = PhotoSession::find($id)->firstOrFail();
        $photosession->background_image_path = $this->backgroundsBaseDir . '/' . $name;
        $photosession->background_image_path_thumbnail = sprintf("%s/tn-%s", $this->backgroundsBaseDir, $name);

        Image::make($photosession->background_image_path)
            ->fit(400)
            ->save($photosession->background_image_path_thumbnail); // save() is an Image Intervention method, not Laravels.

        $photosession->save();

        flash()->success('Congrats', 'You have successfully uploaded a new background for the gallery!');

        return redirect()->back();
    }

    /**
     * Apply a photo to the referenced PhotoSession
     * @param integer   $id
     * @param Request   $request
     */
    public function addPhoto($id, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = $this->makePhoto($request->file('photo'));

        //Save and associate photo with PhotoSession
        PhotoSession::find($id)->firstOrFail()->addPhoto($photo);
    }

    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())
            ->move($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photosession = PhotoSession::find($id);

        return view('admin.pages.gallery', compact('photosession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photosession = PhotoSession::find($id);
        return view('admin.pages.editgallery', compact('photosession'));
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
