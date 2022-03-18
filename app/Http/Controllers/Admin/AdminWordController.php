<?php
namespace App\Http\Controllers\Admin;

use App\Models\WordDefinition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWordController extends Controller
{
	public function index()
	{
		$viewData = [];
		$viewData["title"] = "Admin Page - Words - Turban";
		$viewData["words"] = WordDefinition::all();
		return view('admin.word.index')->with("viewData", $viewData);
	}

	public function store(Request $request)
	{
		WordDefinition::validate($request);
		
		$word = new WordDefinition;

        $word->word = $request->input('word');
        $word->definition = $request->input('definition');
        $word->example = $request->input('example');

        $word->save();

		return back();
	}

	public function delete($id)
	{
		WordDefinition::destroy($id);
		return back();
	}


	public function edit($id)
	{
		$viewData = [];
		$viewData["title"] = "Admin Page - Edit Definition - Turban";
		$viewData["word"] = WordDefinition::findOrFail($id);
		return view('admin.word.edit')->with("viewData", $viewData);
	}

	public function update(Request $request, $id)
	{
		WordDefinition::validate($request);

		$word = WordDefinition::findOrFail($id);

		$word->word = $request->input('word');
		$word->definition = $request->input('definition');
		$word->example = $request->input('example');

		$word->save();

		return redirect()->route('admin.word.index');
	}


}
