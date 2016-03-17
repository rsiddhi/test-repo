<?php namespace App\Model;

use Exception;
use Config;

class Member {

	private $name = '';
	private $gender = '';
	private $phone = '';
	private $email = '';
	private $address = '';
	private $educationBackground = '';
	private $nationality = '';
	private $dob = '';
	private $modeOfContact = array();

	public function setName($name){

		if($name == null || $name == ''){
			throw new Exception("Name is required.");
		}

		$this->name = $name;
	}

	public function setGender($gender){

		$this->gender = $gender;

	}

	public function setPhone($phone){

		if(!preg_match('/^[0-9]+$/', $phone)){
			throw new Exception("A valid phone number is required");
		}
		
		$this->phone = $phone;
	}

	public function setEmail($email){

		$email = trim($email);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new Exception('The email chosen is invalid.');
		}

		$this->email = $email;
	}

	public function setAddress($address){

		$this->address = $address;

	}

	public function setNationality($nationality){
		$this->nationality = $nationality;
	}

	public function setDob($dob){
		$this->dob = $dob;
	}

	public function setEducationBackground($educationBackground){
		$this->educationBackground = $educationBackground;
	}

	public function setModeOfContact($modeOfContact){
		$this->modeOfContact = $modeOfContact;
	}

	public function getName(){

		return $this->name;
	}

	public function getGender(){

		return $this->gender;

	}

	public function getPhone(){

		return $this->phone;
	}

	public function getEmail(){

		return $this->email;
	}

	public function getAddress(){

		return $this->address;

	}

	public function getNationality(){
		return $this->nationality;
	}

	public function getDob(){
		return $this->dob;
	}

	public function getEducationBackground(){
		return $this->educationBackground;
	}

	public function getModeOfContact(){
		return $this->modeOfContact;
	}

	public static function create($params){

		$member = new Member();

		$member->setName($params['name']);
		$member->setGender($params['gender']);
		$member->setPhone($params['phone']);
		$member->setEmail($params['email']);
		$member->setAddress($params['address']);
		$member->setNationality($params['nationality']);
		$member->setDob($params['dob']);
		$member->setEducationBackground($params['educationBackground']);
		$member->setModeOfContact($params['modeOfContact']);

		$member->save();
 		
 		return $member;	
	}

	private function save(){

		$file_path = Config::get('constants.CSV_FILE_PATH');

		if(!is_file($file_path)){
			throw new Exception("Error in saving data to file!");
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
				$this->educationBackground,
				$this->modeOfContact
			)
		);

		fclose($file); 
	}
}