<?php

	// Last Edited : 2025-06-25
	// File name   : DashboardController.php


	// MCG - Massive CRUD Generator Laravel-AdminLTE3-MySQL for Laravel 11 ver. May 2025-Free Version

	// Private message at Telegram        : @yudhi_irawan
	// Private activity feeds at Instagram: @iam.yudhi_irawan

	// Download Massive CRUD Generator on telegram and github link
	// MCG Application: https://t.me/MCGFreeVersion
	// Documentation  : https://yudhi-irawan.github.io/mcg-documentation/tutorial.html
	// Testing        : 
	// Template       : 

	// Donation and Support link
	// Ko-fi   : https://ko-fi.com/MassiveCrudGenerator
	// Trakteer: https://trakteer.id/MassiveCrudGenerator

	// Please follow us for information about new releases


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SexModel;
use App\Models\EduModel;
use App\Models\EmpModel;

class DashboardController extends Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['count_sex'] = SexModel::count();
		$data['count_edu'] = EduModel::count();
		$data['count_emp'] = EmpModel::count();
		return view('dashboard_index', $data);
	}

}
