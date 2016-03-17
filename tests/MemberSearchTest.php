<?php

class MemberSearchTest extends TestCase{

	public function testSearch(){

		$memberSearch = new MemberSearch();

		$this->assertEquals($memberSearch->currentPage, 1);
		$this->assertEquals($memberSearch->perPage, 5);

		$memberSearch->currentPage = 2;
		$memberSearch->perPage = 15;

		$members = $memberSearch->search();

		$this->assertEquals($memberSearch->currentPage, 2);
		$this->assertEquals($memberSearch->perPage, 15);
		$this->assertEquals($memberSearch->totalRows, 1);
		$this->assertEquals($memberSearch[0]['name'],"Runa Siddhi");
	}
}