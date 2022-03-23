<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Cybersecurity extends Model
{
    use HasFactory;

    public function questions ()
    {
        return $this->hasMany(Question::class);
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/cover_img/' . $this->image);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
