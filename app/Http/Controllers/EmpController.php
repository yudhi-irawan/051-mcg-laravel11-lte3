<?php
	// Last Edited       : 2025-06-25
	// File name         : EmpController.php

	// Modul Description : Employee
	// Date              : 2022-01-20
	// Created by.       : yudhi irawan
	// Contact person    : IG: @iam.yudhi_irawan


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
use App\Models\EmpModel;
use App\Models\SexModel;
use App\Models\EduModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class EmpController extends Controller
{
	private static $SQL_one = 'select * from emp_one_view';	//two-1011
	private static $column_order_one = array(null, 'id', 'name', 'bday', 'sex_id', 'sex_desc', 'edu_code', 'edu_desc');	//three-776
	private static $column_search_one = array('id', 'name', 'bday', 'sex_id', 'sex_desc', 'edu_code', 'edu_desc');	//three-781
	private static $order_one = array('id' => 'asc');	//three-819

	public function getdata_one(Request $request)	//two-731
	{
		$dataTablesParams = $request->all();
		$startIndex = $dataTablesParams['start'];
		$draw = $dataTablesParams['draw'];

		$data = EmpModel::getdata_one($dataTablesParams, self::$SQL_one, self::$column_order_one, self::$column_search_one);

		$i = 0;
		$datarows = array();
		$no = $startIndex;
		foreach ($data['data'] as $row) {
			$no++;
			$arr_all=array_merge(array('no' => $no), $row);
			array_push($datarows, $arr_all);
		}
		$output["draw"] = $draw;
		$output["recordsTotal"] = $data["count"];
		$output["recordsFiltered"] = $data["count_filtered"];
		$output["data"] = $datarows;
		echo json_encode($output);
	}

	public function index()	//two-454
	{
		$data = [
		    'title' => 'Employee',
		];
		$data['sex']  = json_decode(json_encode(SexModel::getForLookUp_one()), true);	//object to array
		$data['edu']  = json_decode(json_encode(EduModel::getForLookUp_one()), true);	//object to array
        return view('emp_index', $data);
	}

	public function savecreate_one(Request $request)	//store
	{
		$emp = EmpModel::savecreate_one([
			'name' => $request->name	//three-388
			,'bday' => $request->bday	//three-388
			,'sex_id' => $request->sex_id	//three-388
			,'edu_code' => $request->edu_code	//three-388
        ]);
        $emp_array = json_decode(json_encode($emp), true);	//object to array
        foreach ($emp_array as $output) {};
		return json_encode($output);	//{"result":"OK"}	//559
	}

	public function edit_one(Request $request)	//two-186
	{
		$id = $request->id;	//229
		$emp = EmpModel::find_one($id);
        $emp_array = json_decode(json_encode($emp), true);	//object to array
        foreach ($emp_array as $output) {};
		return json_encode($output);	//{"sex_id":2,"sex_name":"Perempuan","created_by":"","updated_by":""}	//265
	}

	public function saveedit_one(Request $request)	//update
	{
		$emp = EmpModel::saveedit_one([
			'id' => $request->id	//three-365
			,'name' => $request->name	//three-388
			,'bday' => $request->bday	//three-388
			,'sex_id' => $request->sex_id	//three-388
			,'edu_code' => $request->edu_code	//three-388
        ]);
		$emp_array = json_decode(json_encode($emp), true);	//object to array
        foreach ($emp_array as $output) {};
		return json_encode($output);	//{"result":"OK"}	//386
	}

	public function delete_one(Request $request)	//delete	790
	{
		$id = $request->id;	//two-864
		$emp = EmpModel::savedelete_one($id);
		$emp_array = json_decode(json_encode($emp), true);	//object to array
        foreach ($emp_array as $output) {};
		return json_encode($output);	//{"result":"OK"}	//836
	}

	public function get_from_parent_filter_one(Request $request)	//two-882
	{
		if($request->action)
		{
			$action = $request->action;
			if($action == 'sex_id')
			{
				$filter = $request->filter;
				$data = EmpModel::where('sex_id', $filter)->get();
				echo json_encode($data);
			}
			if($action == 'edu_code')
			{
				$filter = $request->filter;
				$data = EmpModel::where('edu_code', $filter)->get();
				echo json_encode($data);
			}
		}
	}

	public function generatepdf_one(Request $request)	//two-1292
	{
		$ctitle = $request->query('title');
		$emp = EmpModel::getbyid_one();
		$data = [
		    'title' => $ctitle,
			'date' => date('m/d/Y'),
			'emp' => $emp
		];
		$html = view('emp_rpt', $data);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->render();

		$canvas = $dompdf->getCanvas();
		$canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
			$text = "Page $pageNumber of $pageCount";
			$font = $fontMetrics->getFont('courier');
			$pageWidth = $canvas->get_width();
			$pageHeight = $canvas->get_height();
			$size = 12;
			$width = $fontMetrics->getTextWidth($text, $font, $size);
			$canvas->text($pageWidth - $width - 20, $pageHeight - 20, $text, $font, $size);
			$canvas->text(35, 18, 'LIST EMP', $font, 12);
		});
		return $dompdf->stream('sample.pdf', array('Attachment'=>'0')); //to screen
	}

	public function testing(Request $request)
	{
		echo $request->todo;
	}

}
