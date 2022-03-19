<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WordDefinition;

use Illuminate\Support\Facades\Auth;



const PAGE_LEN = 1;

class DefineController extends Controller
{
    public function add(Request $request)
    {
        $word = $request->input('word');

        $viewData = [];
        $viewData["subtitle"] = "Tanim Ekle";
        $viewData["title"] = $viewData["subtitle"]." - Turban";
        $viewData ["word"]=  $word;


        return view('home.add')->with("viewData", $viewData);
    }

    public function add_post(Request $request)
    {
        
        $word = new WordDefinition;

        $word->word = $request->input('word');
        $word->definition = $request->input('definition');
        $word->example = $request->input('example');
        $word->user_id =  Auth::user()->id;

        WordDefinition::validate($request);

        if ($word->save() > 0) {
            return redirect()->action('App\Http\Controllers\DefineController@search', ['term'=>$word->word, 'exact' => 1]);
        } else {
            return back()->withInput();
        }
    }

  
    public function search(Request $request)
    {
        if ($request->input('term').trim('')=='') {
            return back()->withInput();
        }

        $search_term_ = $request->input("term");
        $exact_ = $request->input('exact', 0);

        $viewData = [];
        $viewData["subtitle"] = "'".$search_term_."' için arama sonuclari";
        $viewData["title"] = $viewData["subtitle"]." - Turban";
        
        $defs = $exact_ != null && $exact_ != 0
                ? WordDefinition::where('word', $search_term_)
                : WordDefinition::where('word', 'like', $search_term_.'%');

        $defs = $defs->orderBy('word', 'ASC')->paginate(PAGE_LEN);//get();

        $viewData["definitions"] = $defs;
    
        $viewData["search-term"] = $search_term_;

        $viewData["is_exact"] = $exact_ == 1;

        return view('home.search')->with("viewData", $viewData);
    }
}
