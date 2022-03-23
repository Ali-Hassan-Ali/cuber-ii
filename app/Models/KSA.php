<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KSA extends Model
{
    use HasFactory;
    public function getImagePathAttribute()
    {
        return asset('uploads/ksa/' . $this->image);
    }
}
