<?php namespace App\Model;

use Config;
use Exception;

class MemberSearch {

	public $currentPage = 1;
	public $perPage = 5;

	public $totalRows = 0;

	public function get_totalRows(){
		return $this->totalRows;
	}

	public function search(){

		$members = array();
	
		$start = ($this->currentPage > 1) ? ($this->currentPage*$this->perPage)-($this->perPage-1) : 1;
		$end = $this->currentPage * $this->perPage;
		
		$lineCounter = 1;

		if(!is_file(Config::get('constants.CSV_FILE_PATH'))){
			throw new Exception("Error in saving data to file!");
		}

		$rows = file(Config::get('constants.CSV_FILE_PATH'));

		$this->totalRows = count($rows);

		if($this->totalRows > 0){
		    foreach ($rows as $row) {

		    	$lastRow = array_pop($rows);
				$data = str_getcsv($lastRow);			
			  
			  	if($lineCounter>=$start && $lineCounter<=$end)
			  	{
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

			 	$lineCounter++;
			}
		}
		
		return $members;
	}
}