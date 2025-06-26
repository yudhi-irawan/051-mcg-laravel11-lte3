<?php
	// Last Edited       : 2025-06-25
	// File name         : EduModel.php

	// Modul Description : Table Education Level
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

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EduModel extends Model
{
	use HasFactory;
	protected $table = 'edu';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $fillable = ['code', 'desc'];
	private static $SQL_ForLookUp_one = 'select * from edu_one_view';	//two-807

	public static function getdata_one($dataTablesParams, $sql_one, $column_order_one, $column_search_one) //two-352
	{
		$searchString = $dataTablesParams['search']['value'];
		$startIndex = $dataTablesParams['start'];
		$length = $dataTablesParams['length'];
		$orderByColumn = $dataTablesParams['order'][0]['column'];
		$orderByDirection = $dataTablesParams['order'][0]['dir'];

		$SQL = $sql_one;
		$SQL="select * from ( ". $SQL ." ) as xxx";
		$result['count'] = count(json_decode(json_encode(DB::select($SQL)), true));
		$where = '1=1 ';

		//---search all column--------------------------------
		$i = 0;
		foreach ($column_search_one as $item) // loop column 
		{
			if($searchString != '') // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$where .= " and (";
					$where .= " upper($item)";
					$where .= " like upper('%".$searchString."%')";
				}
				else
				{
					$where .= " or ";
					$where .= " upper($item)";
					$where .= " like upper('%".$searchString."%')";
				}
				if(count($column_search_one) - 1 == $i) //last loop
					$where .= ")";
			}
			$i++;
		}
		//---search all column--------------------------------

		$SQL .= " where $where";
		$SQL .= " order by " . $column_order_one[$orderByColumn] . " " . $orderByDirection;
		$result['count_filtered'] = count(json_decode(json_encode(DB::select($SQL)), true));
		$SQL .= " LIMIT $startIndex, $length";
		$result['data'] = json_decode(json_encode(DB::select($SQL)), true);
		return $result;
	}

    public static function getbyid_one($id = false)
    {
        if ($id == false)
        {
			$sql1="select * from ( ". self::$SQL_ForLookUp_one ." ) as xxx";	//two-119
			return DB::select($sql1);	//object
        }
        return DB::table((new static)->table)
        	->where((new static)->primaryKey, $id)
        	->get();	//object
    }

    public static function getForLookUp_one()
	{
		$sql1="select * from ( ". self::$SQL_ForLookUp_one ." ) as xxx";	//two-492
		return DB::select($sql1);	//object
	}

    public static function savecreate_one($arrdata)
	{
		$sql_add = " CALL edu_one_add";
		$sql_add.= " (";
		$sql_add.= "'99999'";
		$sql_add.= ",'".$arrdata['code']."'";
		$sql_add.= ",'".$arrdata['desc']."'";
		$sql_add.= ")";
		return DB::select($sql_add);	//[{"result":"OK"}]		two-798
	}

    public static function saveedit_one($arrdata)
	{
		$sql_edit = " CALL edu_one_edit";
		$sql_edit.= " (";
		$sql_edit.= "'".$arrdata['id']."'";
		$sql_edit.= ",'".$arrdata['code']."'";
		$sql_edit.= ",'".$arrdata['desc']."'";
		$sql_edit.= ")";
		return DB::select($sql_edit);	//[{"result":"OK"}]		two-866
	}

    public static function savedelete_one($id)
	{
		$sql_delete = " CALL edu_one_delete";
		$sql_delete.= " (";
		$sql_delete.= "'".$id."'";
		$sql_delete.= ")";
		return DB::select($sql_delete);	//[{"result":"OK"}]		855
	}

    public static function find_one($id)
	{
		$SQL  = "select * from ( ". self::$SQL_ForLookUp_one ." ) as xxx";	//two-973
		$where= " id = $id";
		$SQL .= " where $where";
		return DB::select($SQL);	//object	two-986
	}


}
