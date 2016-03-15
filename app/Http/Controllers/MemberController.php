<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MemberController extends Controller {

	public function index(){

		$bspaginator = new \App\Library\Bspaginator;

		$member_search = new \App\Model\MemberSearch();

		if(isset($_GET['page'])){

			$member_search->current_page = $_GET['page'];
		}

		$members = $member_search->search();

		return view('member/index',array(
						'title'=>'Members',
						'bspaginator'=>$bspaginator,
						'members' => $members,
						'total_members' => $member_search->get_total_rows()
					)
				);
	}

	public function create(Request $request){

		try{

			if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
				return view('member/create',array('title'=>'Create Member'));
            }          

			$params = array(
				'name' => $request->get('name'),
				'gender' => $request->get('gender'),
				'phone' => $request->get('phone'),
				'email' => $request->get('email'),
				'address' => $request->get('address'),
				'nationality' => $request->get('nationality'),
				'dob' => $request->get('dob'),
				'education_background' => $request->get('education_background'),
				'mode_of_contact' => $request->get('mode_of_contact')
			);

			// print_r($params);exit;

			$member = \App\Model\Member::create($params);

			\Session::flash('message', 'Member '.$member->get_name().' is created successfully');

			return redirect('members');

		} catch(\Exception $e){

			return view('member/create',array(
					'title'=>'Create Member',
					'error_message'=>$e->getMessage()
				)
			);
		}
	}
}