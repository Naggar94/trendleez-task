<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Session;

class AuthorizationController extends Controller
{
	public function index(){
		return view('authorization.index');
	}

	public function login()
	{
		try{
			if (isset($_POST['Login'])){
				$user = Users::whereRaw("email = '".$_POST['Login']['email']."'")->first();
				if ($user != null){
					if(Hash::check($_POST['Login']['password'],$user->password)){
						Session::put('userid',$user->id);
						return redirect('/');
					}
				}
				throw new \Exception();
			}
		}catch(\Exception $e){
			return redirect('/login');
		}
	}

	public function logout()
	{
		Session::flush();
		return redirect('/');
	}
}