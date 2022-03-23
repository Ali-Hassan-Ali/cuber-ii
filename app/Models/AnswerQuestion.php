<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['anser'];

    public function getAnserAttribute()
    {
        return Question::where('id' ,$this->question_id)->get();

    }

    public function answers()
    {
        return $this->belongsTo(Answer::class,'answer_id');

    }//eend of fun

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');

    }//eend of fun
    
}//end of model
