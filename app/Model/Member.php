<?php namespace App\Model;

class Member {

	private $name = '';
	private $gender = '';
	private $phone = '';
	private $email = '';
	private $address = '';
	private $education_background = '';
	private $nationality = '';
	private $dob = '';
	private $mode_of_contact = array();

	public function set_name($name){

		if($name == null || $name == ''){
			throw new \Exception("Name is required.");
		}

		$this->name = $name;
	}

	public function set_gender($gender){

		$this->gender = $gender;

	}

	public function set_phone($phone){

		if(!preg_match('/^[0-9]+$/', $phone)){
			throw new \Exception("A valid phone number is required");
		}
		
		$this->phone = $phone;
	}

	public function set_email($email){

		$email = trim($email);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \Exception('The email chosen is invalid.');
		}

		$this->email = $email;
	}

	public function set_address($address){

		$this->address = $address;

	}

	public function set_nationality($nationality){
		$this->nationality = $nationality;
	}

	public function set_dob($dob){
		$this->dob = $dob;
	}

	public function set_education_background($education_background){
		$this->education_background = $education_background;
	}

	public function set_mode_of_contact($mode_of_contact){
		$this->mode_of_contact = $mode_of_contact;
	}

	public function get_name(){

		return $this->name;
	}

	public function get_gender(){

		return $this->gender;

	}

	public function get_phone(){

		return $this->phone;
	}

	public function get_email(){

		return $this->email;
	}

	public function get_address(){

		return $this->address;

	}

	public function get_nationality(){
		return $this->nationality;
	}

	public function get_dob(){
		return $this->dob;
	}

	public function get_education_background(){
		return $this->education_background;
	}

	public function get_mode_of_contact(){
		return $this->mode_of_contact;
	}

	public static function create($params){

		$member = new Member();

		$member->set_name($params['name']);
		$member->set_gender($params['gender']);
		$member->set_phone($params['phone']);
		$member->set_email($params['email']);
		$member->set_address($params['address']);
		$member->set_nationality($params['nationality']);
		$member->set_dob($params['dob']);
		$member->set_education_background($params['education_background']);
		$member->set_mode_of_contact($params['mode_of_contact']);

		$member->save();
 		
 		return $member;	
	}

	private function save(){

		$file_path = \Config::get('constants.CSV_FILE_PATH');

		if(!is_file($file_path)){
			throw new \Exception("Error in saving data to file!");
		}

		$file = fopen($file_path, 'a');  

		fputcsv(
			$file, 
			array(
				$this->name,
				$this->gender,
				$this->phone,
				$this->email,
				$this->address,
				$this->nationality,
				$this->dob,
				$this->education_background,
				$this->mode_of_contact
			)
		);

		fclose($file); 
	}
}