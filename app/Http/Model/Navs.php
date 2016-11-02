<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    protected $table = 'navs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}