<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $params = array(
                "name"=>"runa",
                "gender"=>"female",
                "phone"=>"9841223344",
                "address"=>"Kathmandu",
                "email"=>"runa@abc.com",
                "dob"=>"10/23/1989",
                "nationality"=>"nepali",
                "education_backgrond"=>"IT",
                "mode_of_contact"=>"sms",
            );

        $member = Member::create($parmas);

        $this->assertEquals($member->get_name(),"runa");
        $this->assertEquals($member->get_gender(),"female");
        $this->assertEquals($member->get_phone(),"9841223344");
        $this->assertEquals($member->get_address(),"Kathmandu");
        $this->assertEquals($member->get_email(),"runa@abc.com");        
        $this->assertEquals($member->get_dob(),"10/23/1989");
        $this->assertEquals($member->get_nationality(),"nepali");
        $this->assertEquals($member->get_education_background(),"IT");
        $this->assertEquals($member->get_mode_of_contact(),"sms");

    }

    public function testCreate_without_name(){

        $params = array(
                "name"=>"",
                "gender"=>"female",
                "phone"=>"9841223344",
                "address"=>"Kathmandu",
                "email"=>"runa@abc.com",
                "dob"=>"10/23/1989",
                "nationality"=>"nepali",
                "education_backgrond"=>"IT",
                "mode_of_contact"=>"sms",
            );

        $this->setExpectedException('Exception');

        $member = Member::create($parmas);
    }

    public function testCreate_when_phone_invalid(){

        $params = array(
                "name"=>"",
                "gender"=>"female",
                "phone"=>"dsgfd",
                "address"=>"Kathmandu",
                "email"=>"runa@abc.com",
                "dob"=>"10/23/1989",
                "nationality"=>"nepali",
                "education_backgrond"=>"IT",
                "mode_of_contact"=>"sms",
            );

        $this->setExpectedException('Exception');

        $member = Member::create($parmas);
    }
}
