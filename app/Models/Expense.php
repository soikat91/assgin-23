<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable=['amount','description','date','category','user_id'];

    function user(){
        $this->belongsTo('users');
    }
}
