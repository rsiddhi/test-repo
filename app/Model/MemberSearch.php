<?php namespace App\Model;

class MemberSearch {

	public $current_page = 1;
	public $per_page = 5;

	public $total_rows = 0;

	public function get_total_rows(){
		return $this->total_rows;
	}

	public function search(){

		$members = array();
	
		$start = ($this->current_page > 1) ? ($this->current_page*$this->per_page)-($this->per_page-1) : 1;
		$end = $this->current_page * $this->per_page;
		
		$line_counter = 1;

		$rows = file(\Config::get('constants.CSV_FILE_PATH'));

		$this->total_rows = count($rows);

		if($this->total_rows > 0){
			foreach ($rows as $row) {

		    	$last_row = array_pop($rows);
				$data = str_getcsv($last_row);			
			  
			  	if($line_counter>=$start && $line_counter<=$end)
			  	{
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

			 	$line_counter++;
			}
		}
		
		return $members;
	}
}