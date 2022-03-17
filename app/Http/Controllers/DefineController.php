<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefineController extends Controller
{
    public static $definitions = [
        ["id" => 1, "word" => "adam", "definition" => "madam yapilabilen unsur", "example"=> "biz adami madam yapariz kardes!"],
        ["id" => 2, "word" => "dangalak", "definition" => "benim disimda herkesin olma potansiyeli tasidigi durum.", "example"=> "kardes dangalak misin bir cekil surdan!"],
        ["id" => 3, "word" => "inek", "definition" => "cok ders calisan", "example"=> "95 alinca uzuldu bizim inek."],
        ["id" => 4, "word" => "deli", "definition" => "hikmetinden sual olunmayan", "example"=> "konus deli, susma!"],
        ["id" => 5, "word" => "usta", "definition" => "acemi olmayan", "example"=> "o bu isin ustasi"],
        ["id" => 6, "word" => "inek", "definition" => "sut veren hayvan", "example"=> "bizim inek cok sut verir."],
        ["id" => 7, "word" => "adam", "definition" => "herhangi biri", "example"=> "adam isi biliyor ya!"],
        ["id" => 8, "word" => "dam", "definition" => "evin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasievin bacasi", "example"=> "evin dami ruzgardan ucmus!"],
         ["id" => 9, "word" => "saddam", "definition" => "asdpas daks pdkasod kaosdk aoskd oaksd oaskd oaksodaks odas odkaos kdaok", "example"=> "saddam olmus"],

         ["id" => 10, "word" => "tata", "definition" => "aodfsdofsodfosdofsodfo wero weorr _WERWE_R W_ERW_ER_ WE_Rwaer fssa FSA_f SDFas DFAS FS_D FAs-df SFRE W+t RTSR_ TSER TER_T W_ERT ERT_ SR TeR__s kdaok", "example"=> "tata tata tata!"],

    ];

    public function add(Request $request)
    {
        if ($request->input('word').trim('')=='') {
            return back()->withInput();
        }

        $word = $request->input('word');

        $viewData = [];
        $viewData["subtitle"] = "Tanim Ekle"; 
        $viewData["title"] = $viewData["subtitle"]." - Turban";
        $viewData ["word"]=  $word;

        return view('home.add')->with("viewData", $viewData);
    }

    public function add_post(Request $request)
    {   
        return back()->withInput();
    }


    public function search(Request $request)
    {
        if ($request->input('term').trim('')=='') {
            return back()->withInput();
        }

        $viewData = [];
        $viewData["subtitle"] = "'".$request->input('term')."' için arama sonuclari";
        $viewData["title"] = $viewData["subtitle"]." - Turban";

        
        $exact_ = $request->input('exact', 0);

        $comp_func = function ($var) use($request, $exact_) {

            if ($exact_ != null && $exact_ != 0) 
                return $var["word"] == $request->input('term');
            else
                return str_starts_with($var["word"],$request->input('term'));
        };

        $defs = array_filter(DefineController::$definitions, $comp_func);
        
        usort($defs, function($a, $b){ return strcmp($a["word"], $b["word"]); }
);
        $viewData["definitions"] = $defs;
        
        $viewData["search-term"] = $request->input('term'); 

        $viewData["is_exact"] = $exact_ == 1;

        return view('home.search')->with("viewData", $viewData);
    }

    
}
