<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Forum extends Model
{
    use HasFactory;

    public function getForums()
    {
        if(Auth::user()->class_code == 'LEC')
        {
            return Forum::all();
        }
        else
        {
            return Forum::where('class_code', '=', Auth::user()->class_code)->get();
        }
    }
}
