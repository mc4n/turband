<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordDefinition extends Model
{
    protected $table = "word_definitions";

    public static function validate($request)
    {
        $request->validate([
        "word" => "required|max:48",
        "definition" => "required|max:512",
        ]);
    }
}
