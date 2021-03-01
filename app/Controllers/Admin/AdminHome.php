<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminHome extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Beranda',
			'navItem' => 1
		];

		return view('admin/index', $data);
	}

	public function test()
	{
		$data = [
			'title' => 'Test'
		];

		return view('admin/index', $data);
	}
}
