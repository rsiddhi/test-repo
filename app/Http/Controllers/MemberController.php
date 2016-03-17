<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Model\Member as Member;
use App\Model\MemberSearch as MemberSearch;

class MemberController extends Controller 
{

	public function index(Request $request)
	{
		try{
			$bspaginator = new \App\Library\Bspaginator;

			$memberSearch = new MemberSearch();

			if($request->get('page')){

				$memberSearch->current_page = $_GET['page'];
			}

			$members = $memberSearch->search();

			return view('member/index',array(
							'title'=>'Members',
							'bspaginator'=>$bspaginator,
							'members' => $members,
							'total_members' => $memberSearch->get_totalRows()
						)
					);

		} catch(\Exception $e){

			\Log::info(date("Y-m-d H:i:s")."==>".$e->getMessage());

			return view('member/index',array(
							'title'=>'Members',
							'bspaginator'=>$bspaginator,
							'members' => array(),
							'total_members' => 0,
							'error_message' => "Error!!"
						)
					);
		}
		
	}

	public function create(Request $request)
	{

		try{

			if (!$request->isMethod('post')) {
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

			$member = Member::create($params);

			$request->session()->flash('message', 'Member '.$member->get_name().' is created successfully');

			return redirect('members');

		} catch(\Exception $e){

			\Log::info(date("Y-m-d H:i:s")."==>".$e->getMessage());

			return view('member/create',array(
					'title'=>'Create Member',
					'error_message'=>$e->getMessage()
				)
			);
		}
	}
}