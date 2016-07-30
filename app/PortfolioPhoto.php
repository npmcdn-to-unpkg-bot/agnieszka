<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model
{
	/*
	 * Fillable fields for a photos.
	 *
	 * @var array
	 */
    protected $fillable = ['path', 'category'];

}