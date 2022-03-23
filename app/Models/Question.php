<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Question extends Model
{
    use HasFactory;

    public function cyber()
    {
        return $this->belongsTo(Cybersecurity::class);
    }

    public function  answers()
    {
        return $this->hasMany(Answer::class);
    }
}
