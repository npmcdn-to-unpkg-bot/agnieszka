<?php

namespace App\Http\Controllers;

use App;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function chooser($lang)
    {
    	Session::set('locale', $lang);
    	App::setLocale($lang);
    	
    	return back();
    }
}
