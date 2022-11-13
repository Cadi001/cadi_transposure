<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transit_review extends Model
{
    use HasFactory;
    function getTerminals(){
        $results = DB::select('select * from users where id = :id', ['id' => 1]);
        return $results;
    }
    
}
