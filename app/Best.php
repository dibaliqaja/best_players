<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Best extends Model
{
    protected $table = "best_player";
    protected $fillable = ['nickname','point'];
}
