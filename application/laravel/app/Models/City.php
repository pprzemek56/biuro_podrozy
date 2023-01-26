<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;



    protected $fillable = ['country_id', 'name'];

    public function trips(){
        return $this->hasMany(Trip::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
