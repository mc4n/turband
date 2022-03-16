<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
