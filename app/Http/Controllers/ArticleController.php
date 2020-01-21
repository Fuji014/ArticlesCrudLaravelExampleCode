<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

// model
use App\articleModel;

class ArticleController extends Controller
{
    // welcome page
	public function welcome(){
		$results = articleModel::all();
		return view('welcome',compact('results'))	;
	}

	// create page
	public function create(){
		return view('articleCrud.create');
	}

	// articles create
	public function store(){
		// create validation
		request()->validate([
			'title' => 'required',
			'description' => 'required'
		]);
		// end of validation
		$article = new articleModel;
		$article->title = request('title');
		$article->description = request('description');
		$article->gender = request('radioGender');
		$article->civilStatus = request('ChkboxCivilStatus');
		$article->school = request('schoolName');
		if($article->civilStatus == null){
			$article->civilStatus = "False";
		}
		if($article->save()){
			Session::flash('createFlash', 'Successfully Added!');
		}
		return redirect('/');
	}

	// show by detailed id
	public function show(articleModel $article){
		return $article;
		return view('articleCrud.show',compact('article'));
	}
	
	// edit article
	public function edit(articleModel $id){
		$article = $id;
		return view('articleCrud.edit',compact('article'));
	}

	// update article
	public function update(articleModel $id){
		$article = $id;
		$article->title = request('title');
		$article->description = request('description');
		$article->gender = request('radioGender');
		$article->civilStatus = request('ChkboxCivilStatus');
		$article->school = request('schoolName');
		if($article->civilStatus == null){
			$article->civilStatus = "False";
		}
		if($article->save()){
			Session::flash('updateFlash', 'Update Success!');
		}

		return redirect('/');
	}

	// fill all boxes in edit
	public function tryEdit(articleModel $id){
		$data = $id;
		return response()->json(['data' => $data]);
	}

	public function tryUpdate(Request $request){
		$id = $request->id;
		$article = articleModel::findOrFail($id);
		$article->title = $request->title;
		$article->description = $request->description;
		$article->gender = $request->radioGender;
		$article->civilStatus = $request->ChkboxCivilStatus;
		$article->school = $request->schoolName;
		$article->save();

	}

	// delete article
	public function destroy(articleModel $id){
		$article = $id;
        if($article->delete()){
        	Session::flash('deleteFlash', 'Delete Success!');
        }
	}
}
