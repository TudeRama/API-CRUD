<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    static public function getBuku(){
        return DB::table('bukus');
    }
}
