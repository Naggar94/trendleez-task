<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Articles;
use App\Models\Categories;
use Session;

class HomeController extends Controller
{
	public function fetch(){
		$response = array();
		$response['success'] = true;
		$response['error_msg'] = '';
		try{
			$offset = $_POST['page'] * 10;
			$category_id = $_POST['category_id'];
			$articles = Articles::select([DB::raw("CONCAT(users.first_name,'',users.last_name) AS user_name"),"categories.name AS category_name","articles.content","articles.id"])->join('users','users.id','=','articles.created_by')->join('categories','categories.id','=','articles.category_id')->orderBy('id','desc')->skip($offset)->take(10);
			if ($category_id != ''){
				$articles->where('category_id','=',$category_id);
			}
			$response['feed'] = $articles->get()->toArray();
		}catch (\Exception $e){
			$response['success'] = false;
			$response['error_msg'] = $e->getMessage();
		}

		echo json_encode($response);
	}

	public function index(){
		$articles = Articles::orderBy('id','desc')->skip(0)->take(10)->get();
		$categories = Categories::get();
		return view('home.index',['articles'=>$articles,'categories'=>$categories]);
	}
}