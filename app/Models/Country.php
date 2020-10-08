<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    public function cities() {
        return $this->hasMany(City::class,'country_id','id');
    }
}
