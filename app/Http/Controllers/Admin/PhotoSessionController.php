<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\User;
use App\Photo;
use Carbon\Carbon;
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
        $photosessions = PhotoSession::latest('date')->get();

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
            'date' => $request->date,
            'photo_download_limit' => $request->photo_download_limit,
            'expiry_date' => $request->expiry_date,
        ]);

        $user->photosessions()->save($photosession);

        flash()->success('Nice one! :)', 'You have successfully created a new Photosession!');
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
        $photosession = PhotoSession::findOrFail($id);
        $photosession->background_image_path = $this->backgroundsBaseDir . '/' . $name;
        $photosession->background_image_path_thumbnail = sprintf("%s/tn-%s", $this->backgroundsBaseDir, $name);

        Image::make($photosession->background_image_path)
            ->fit(400)
            ->save($photosession->background_image_path_thumbnail); // save() is an Image Intervention method, not Laravels.

        $photosession->save();

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
        PhotoSession::findOrFail($id)->addPhoto($photo);
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
        $photosession = PhotoSession::findOrFail($id);

        return view('admin.pages.gallery', compact('photosession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($photosessions)
    {
        $photosession = PhotoSession::findOrFail($photosessions);
        return view('admin.pages.editgallery', compact('photosession'));
    }

    /**
     * Update the title in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTitle(Request $request, $id)
    {
        $photosession = PhotoSession::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|min:5'
        ]);

        $photosession->title = $request->title;

        $photosession->save();

        flash()->success('Nice one! :)', 'You have successfully updated the title!');
        return redirect()->back();
    }

    /**
     * Enable cleint to download photos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enableAndDisableToDownloadPhotos(Request $request, $id)
    {

        $photosession = PhotoSession::findOrFail($id);

        $this->validate($request, [
            'has_permission_to_download' => 'required'
        ]);

        $photosession->has_permission_to_download = $request->has_permission_to_download;

        $photosession->save();

        $request->has_permission_to_download ? flash()->success('Nice one! :)', 'Your client now able to download photos from the gallery!') : flash()->error('Ok! :(', 'Your client now unable to download photos from the gallery!');

        return redirect()->back();
    }

    public function mark_as_ordered_or_unordered(Request $request, $id)
    {
        $photosession = PhotoSession::findOrFail($id);

        $this->validate($request, [
            'ordered' => 'required'
        ]);

        $photosession->ordered = $request->ordered;

        $photosession->save();

        return redirect()->back();
    }

    public function markAsPurchased(Request $request, $id)
    {
        $photosession = PhotoSession::findOrFail($id);

        $photosession->purchased = true;

        $photosession->save();

        return redirect()->back();
    }

    public function publish(Request $request, $id)
    {
        $photosession = PhotoSession::findOrFail($id);

        $photosession->published = true;

        $photosession->save();

        return redirect()->back();
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
