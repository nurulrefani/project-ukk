<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardpetugas extends BaseController
{
	public function index()
	{
		$data['intro']='<div class="jumbotron mt-5">
		<h1>Hallo, '.session()->get('username').'</h1>
		<p>Selamat datang di aplikasi penngaduan masyarakat !</p>
	  </div>';
		return view ('dashboard', $data);
	}
}
