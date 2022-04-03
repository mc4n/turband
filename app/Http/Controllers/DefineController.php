<?php
namespace App\Http\Controllers;

use App\Models\WordDefinition;
use App\Models\Vote;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function edit(Request $request, $id)
    {
        $word = WordDefinition::findOrFail($id);

        Gate::authorize('update', $word);

        $viewData = [];
        $viewData["subtitle"] = "Tanim Guncelle";
        $viewData["title"] = $viewData["subtitle"]." - Turban";

        $viewData ["word"]=  $word;

        return view('home.update')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $word = WordDefinition::findOrFail($id);

        Gate::authorize('update', $word);

        WordDefinition::validate($request);

        $word->word = $request->input('word');
        $word->definition = $request->input('definition');
        $word->example = $request->input('example');

        WordDefinition::validate($request);

        if ($word->save() > 0) {
            return redirect()->action('App\Http\Controllers\DefineController@search', ['term'=>$word->word, 'exact' => 1]);
        } else {
            return back()->withInput();
        }
    }

    public function delete($id)
    {
        $word = WordDefinition::findOrFail($id);

        Gate::authorize('delete', $word);

        WordDefinition::destroy($id);
        
        return back();
    }

    public function vote(Request $request, $word_definition_id, $is_like)
    {
        $me_vote = WordDefinition::find($word_definition_id)->votes->firstwhere('user_id', Auth::user()->id);

        if($me_vote != null){
            if($me_vote->is_like == $is_like)
            {
                $me_vote->delete();
            }
            else
            {
                $me_vote->is_like = $is_like;
                $me_vote->save();
            }
        }
        else
        {
            $vote = new Vote;
            $vote->is_like = $is_like;
            $vote->word_definition_id = $word_definition_id;
            $vote->user_id =  Auth::user()->id;

            Vote::validate($request);

            $vote->save();
        }
        return back();
    }
  
    public function search(Request $request)
    {    
        $search_term_ = $request->input("term");
        $exact_ = $request->input('exact', 0);
        $owner_ = \App\Models\User::where('nickname', $request->input("owner"))->first();

        if ($search_term_.trim('') == '' && $owner_ == null) {
            return back()->withInput();
        }

        $viewData = [];
        
        
       if($owner_ == null){
            $viewData["subtitle"] = $exact_ != 0? "'".$search_term_."' icin tanimlar":"'".$search_term_."' için arama sonuclari";
            $defs = $exact_ != null && $exact_ != 0
                ? WordDefinition::where('word', $search_term_)
                : WordDefinition::where('word', 'like', $search_term_.'%');
        }
       else{
            $viewData["subtitle"] = "'".$request->input("owner")."' kullanicisina ait tanimlar"; 
            $defs = WordDefinition::where('user_id', $owner_->id);
        }

        $defs = $defs->withCount([
            'votes as dislikes_count' => function ($query) {
                $query->where('is_like', 0);
            },

            'votes as likes_count' => function ($query) {
                $query->where('is_like', 1);
            },
         ]);

        if(Auth::user() != null) $defs =  $defs->withCount(['votes as user_likes_count' => function ($query) {
                $query->where('is_like', 1)->where('user_id', Auth::user()->id);
            },
            'votes as user_dislikes_count' => function ($query) {
                $query->where('is_like', 0)->where('user_id', Auth::user()->id);
            },]);


        $defs = $defs->orderBy('word', 'ASC')
            ->orderBy('likes_count', 'DESC')
            ->orderBy('dislikes_count', 'ASC')->paginate(PAGE_LEN);
        
        $viewData["title"] = $viewData["subtitle"]." - Turban";
        $viewData["search-term"] = $search_term_;
        $viewData["is_exact"] = $exact_ == 1;
        $viewData["owner"] = $owner_;
        $viewData["definitions"] = $defs;

        return view('home.define')->with("viewData", $viewData);
    }
}
