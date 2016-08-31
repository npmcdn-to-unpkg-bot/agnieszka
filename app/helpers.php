<?php

function flash($title = null,$message = null)
{
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title,$message);
}

function categories()
{
	$categories = ['family', 'newborn', 'maternity', 'engagement', 'artistic'];

	return $categories;
}

function setActiveNavigation($path, $active = 'activeNav') {
	return Request::is($path) ? $active : '';
}

function setActiveForAdminNavigation($path, $active = 'active') {
	return Request::is($path) ? $active : '';
}