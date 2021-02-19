<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $fillable = [
        'country_id',
        'name'
    ];

    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    public function city()
    {
        return $this->hasMany('App\Models\City');
    }
}
