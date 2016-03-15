<?php namespace App\Http\Controllers;

class DashboardController extends Controller {

	public function index(){

		$file_apth = \Config::get('constants.CSV_FILE_PATH');

		$rows = file($file_apth);

		$total_members = count($rows);

		$number_of_members = ($total_members > 0) ? (($total_members < 5) ? $total_members : 5) : 0;
		
		$members =array();
		for($i=0;$i<$number_of_members;$i++){

			$last_row = array_pop($rows);
			$data = str_getcsv($last_row);

			$each_member = array();

			$each_member['name'] = $data[0];
	        $each_member['gender'] = $data[1];
	        $each_member['phone'] = $data[2];
	        $each_member['email'] = $data[3];
	        $each_member['address'] = $data[4];
	        $each_member['nationality'] = $data[5];
	        $each_member['dob'] = $data[6];
	        $each_member['education_background'] = $data[7];
	        $each_member['mode_of_contact'] = $data[8];

	        $members[] = $each_member;
		}

		return view('dashboard',array('title'=>'Dashboard','members'=>$members));
	}
}