<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['city_id', 'description', 'period', 'price', 'image', 'free_space', 'start_date', 'end_date'];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'trips_users');
    }

}
