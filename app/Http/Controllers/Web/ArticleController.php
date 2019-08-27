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

class ArticleController extends Controller
{
	public function add(){
		$categories = Categories::get();
		return view('article.add',['categories'=>$categories]);
	}

	public function postAdd(){
		try{
			$article = new Articles();
			$article->fill($_POST['Article']);
			if (!$article->save()){
				throw new \Exception();
			}
		}catch(\Exception $e){
			Session::flash('error_msg', json_encode($e->getMessage()));
			return redirect("article/add");
		}

		return redirect("/");
	}

	public function edit(){
		try{
			$categories = Categories::get();
			$article = Articles::where('id','=',$_GET['id'])->first();
			return view('article.edit',['categories'=>$categories,'article'=>$article]);
		}catch(\Exception $e){
			Session::flash('error_msg', json_encode($e->getMessage()));
			return redirect("/");
		}
	}

	public function postEdit(){
		try{
			$article = Articles::where('id','=',$_POST['Article']['id'])->first();
			$article->fill($_POST['Article']);
			if (!$article->save()){
				throw new \Exception();
			}

			return redirect("article/view?id=".$_POST['Article']['id']);
		}catch(\Exception $e){
			Session::flash('error_msg', json_encode($e->getMessage()));
			if (isset($_POST['Article']['id'])){
				return redirect("article/edit?id=".$_POST['Article']['id']);
			}

			return redirect("/");
		}
	}

	public function view(){
		try{
			$article = Articles::where('id','=',$_GET['id'])->first();
			return view('article.view',['article'=>$article]);
		}catch(\Exception $e){
			Session::flash('error_msg', json_encode($e->getMessage()));
			return redirect("/");
		}
	}

	public function delete(){
		try{
			if(!Articles::where('id','=',$_POST['id'])->delete()){
				throw new \Exception();
			}
		}catch(\Exception $e){
			Session::flash('error_msg', json_encode($e->getMessage()));
		}

		return redirect("/");
	}
}