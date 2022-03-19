<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class WordDefinition extends Model
{
    protected $table = "word_definitions";

    public static function validate($request)
    {
        $request->validate([
        "word" => "required|max:48",
        "definition" => "required|max:512",
        "user_id" => "exists:users,id",
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
