<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WordDefinition;
use App\Models\Vote;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Anasayfa - Turban";
        return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Hakkında - Turban";
        $viewData["subtitle"] = "Hakkında";
        $viewData["description"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In porttitor metus vitae ex lobortis lacinia. Cras sed ante eget nulla condimentum tristique eget rhoncus ligula. Nulla at dui vitae nibh eleifend fringilla quis sodales libero. Morbi ut ornare risus. Proin in porta felis. Integer nibh diam, cursus eu dignissim vel, luctus vel nibh.";
        $viewData["author"] = "MCA tarafından gelistildi.";
        return view('home.about')->with("viewData", $viewData);
    }

    public function account(){
        $viewData = [];
        $viewData["title"] = "Hesap - Turban";
        $viewData["subtitle"] = "Hesap";
        return view('home.account')->with("viewData", $viewData);
    }

    public function votes(){
        $viewData = [];
        $viewData["title"] = "Oyladiklarin - Turban";
        $viewData["subtitle"] = "Oyladiklarin";

        $defs = WordDefinition::whereRelation('votes', 'user_id', Auth::user()->id)->withCount([
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
            ->orderBy('dislikes_count', 'ASC')->paginate(8);


        $viewData["definitions"] =  $defs;


        $viewData["search-term"] = null;
        $viewData["is_exact"] = 0;
        $viewData["owner_id"] =Auth::user()->id;

        return view('home.define')->with("viewData", $viewData);
    }
}
