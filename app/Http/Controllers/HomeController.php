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
        $viewData["title"] = "Anasayfa - Turband";
        return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Hakkında - Turband";
        $viewData["subtitle"] = "Hakkında";
        $viewData["description"] = "Bu site bir interaktif Turkce halk dili sozlugu projesidir.";
        $viewData["author"] = "MCA tarafından gelistilmistir.";
        return view('home.about')->with("viewData", $viewData);
    }

    public function account()
    {
        $viewData = [];
        $viewData["title"] = "Hesabınız - Turband";
        $viewData["subtitle"] = "Hesabınız";
        return view('home.account')->with("viewData", $viewData);
    }

    public function votes()
    {
        $viewData = [];
        $viewData["title"] = "Oyladıkların - Turband";
        $viewData["subtitle"] = "Oyladıkların";

        $defs = WordDefinition::whereRelation('votes', 'user_id', Auth::user()->id)->withCount([
                    'votes as dislikes_count' => function ($query) {
                        $query->where('is_like', 0);
                    },

                    'votes as likes_count' => function ($query) {
                        $query->where('is_like', 1);
                    },
                 ]);

        if (Auth::user() != null) {
            $defs =  $defs->withCount(['votes as user_likes_count' => function ($query) {
                $query->where('is_like', 1)->where('user_id', Auth::user()->id);
            },
            'votes as user_dislikes_count' => function ($query) {
                            $query->where('is_like', 0)->where('user_id', Auth::user()->id);
            },]);
        }


        $defs = $defs->orderBy('word', 'ASC')
            ->orderBy('likes_count', 'DESC')
            ->orderBy('dislikes_count', 'ASC')->paginate(8);


        $viewData["definitions"] =  $defs;


        $viewData["search-term"] = null;
        $viewData["is_exact"] = 0;
        $viewData["owner"] =Auth::user();

        return view('home.define')->with("viewData", $viewData);
    }
}
