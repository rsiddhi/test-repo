<?php namespace App\Http\Controllers;

class DashboardController extends Controller {

	public function index(){

		$filePath = \Config::get('constants.CSV_FILE_PATH');

		$rows = file($filePath);

		$totalMembers = count($rows);

		$numberOfMembers = ($totalMembers > 0) ? (($totalMembers < 5) ? $totalMembers : 5) : 0;
		
		$members =array();
		for($i=0;$i<$numberOfMembers;$i++){

			$lastRow = array_pop($rows);
			$data = str_getcsv($lastRow);

			$eachMember = array();

			$eachMember['name'] = $data[0];
	        $eachMember['gender'] = $data[1];
	        $eachMember['phone'] = $data[2];
	        $eachMember['email'] = $data[3];
	        $eachMember['address'] = $data[4];
	        $eachMember['nationality'] = $data[5];
	        $eachMember['dob'] = $data[6];
	        $eachMember['education_background'] = $data[7];
	        $eachMember['mode_of_contact'] = $data[8];

	        $members[] = $eachMember;
		}

		return view('dashboard',array('title'=>'Dashboard','members'=>$members));
	}
}