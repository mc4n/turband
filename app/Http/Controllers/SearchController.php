<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('term').trim('')=='') {
            return back()->withInput();
        }

        $viewData = [];
        $viewData["title"] = "'".$request->input('term')."' için arama sonuclari - Turban";

        $viewData["search-term"] = $request->input('term');

        return view('home.search')->with("viewData", $viewData);
    }
}
