<?php
	// Last Edited       : 2025-06-25
	// File name         : SexController.php

	// Modul Description : Tabel Sex
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
use App\Models\SexModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class SexController extends Controller
{
	private static $SQL_one = 'select * from sex_one_view';	//two-1011
	private static $column_order_one = array(null, 'id', 'desc');	//three-776
	private static $column_search_one = array('id', 'desc');	//three-781
	private static $order_one = array('id' => 'asc');	//three-819

	public function getdata_one(Request $request)	//two-731
	{
		$dataTablesParams = $request->all();
		$startIndex = $dataTablesParams['start'];
		$draw = $dataTablesParams['draw'];

		$data = SexModel::getdata_one($dataTablesParams, self::$SQL_one, self::$column_order_one, self::$column_search_one);

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
		    'title' => 'Tabel Sex',
		];
        return view('sex_index', $data);
	}

	public function savecreate_one(Request $request)	//store
	{
		$sex = SexModel::savecreate_one([
			'desc' => $request->desc	//three-388
        ]);
        $sex_array = json_decode(json_encode($sex), true);	//object to array
        foreach ($sex_array as $output) {};
		return json_encode($output);	//{"result":"OK"}	//559
	}

	public function edit_one(Request $request)	//two-186
	{
		$id = $request->id;	//229
		$sex = SexModel::find_one($id);
        $sex_array = json_decode(json_encode($sex), true);	//object to array
        foreach ($sex_array as $output) {};
		return json_encode($output);	//{"sex_id":2,"sex_name":"Perempuan","created_by":"","updated_by":""}	//265
	}

	public function saveedit_one(Request $request)	//update
	{
		$sex = SexModel::saveedit_one([
			'id' => $request->id	//three-365
			,'desc' => $request->desc	//three-388
        ]);
		$sex_array = json_decode(json_encode($sex), true);	//object to array
        foreach ($sex_array as $output) {};
		return json_encode($output);	//{"result":"OK"}	//386
	}

	public function delete_one(Request $request)	//delete	790
	{
		$id = $request->id;	//two-864
		$sex = SexModel::savedelete_one($id);
		$sex_array = json_decode(json_encode($sex), true);	//object to array
        foreach ($sex_array as $output) {};
		return json_encode($output);	//{"result":"OK"}	//836
	}

	public function get_from_parent_filter_one(Request $request)	//two-882
	{
		if($request->action)
		{
			$action = $request->action;
		}
	}

	public function generatepdf_one(Request $request)	//two-1292
	{
		$ctitle = $request->query('title');
		$sex = SexModel::getbyid_one();
		$data = [
		    'title' => $ctitle,
			'date' => date('m/d/Y'),
			'sex' => $sex
		];
		$html = view('sex_rpt', $data);
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
			$canvas->text(35, 18, 'LIST SEX', $font, 12);
		});
		return $dompdf->stream('sample.pdf', array('Attachment'=>'0')); //to screen
	}

	public function testing(Request $request)
	{
		echo $request->todo;
	}

}
