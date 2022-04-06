<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = "votes";

    public static function validate($request)
    {
        $request->validate([
            "is_like" => "boolean",
            "word_definition_id" =>"exists: word_definitions,id",
            "user_id" => "exists:users,id",
        ]);
    }

    public function wordDefinition()
    {
        return $this->belongsTo(WordDefinition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
