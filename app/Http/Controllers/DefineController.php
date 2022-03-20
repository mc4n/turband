<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WordDefinition;

use Illuminate\Support\Facades\Auth;



const PAGE_LEN = 8;

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
        $search_term_ = $request->input("term");
        $exact_ = $request->input('exact', 0);
        $owner_id_ = $request->input("owner", 0);

        if ($search_term_.trim('') == '' && $owner_id_ == null) {
            return back()->withInput();
        }

        $viewData = [];
        
        
       if($owner_id_ == null){
            $viewData["subtitle"] = $exact_ != 0? "'".$search_term_."' icin tanimlar":"'".$search_term_."' için arama sonuclari";
            $defs = $exact_ != null && $exact_ != 0
                ? WordDefinition::where('word', $search_term_)
                : WordDefinition::where('word', 'like', $search_term_.'%');
        }
       else{
            $viewData["subtitle"] = "kullanici tanimlari"; 
            $defs = WordDefinition::where('user_id', $owner_id_);
        }

        $defs = $defs->orderBy('word', 'ASC')->paginate(PAGE_LEN);
        
        $viewData["title"] = $viewData["subtitle"]." - Turban";
        $viewData["search-term"] = $search_term_;
        $viewData["is_exact"] = $exact_ == 1;
        $viewData["owner_id"] = $owner_id_;
        $viewData["definitions"] = $defs;

        return view('home.define')->with("viewData", $viewData);
    }
}
