<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'lastname', 'firstname', 'middlename', 'address', 'department_id', 'city_id', 'state_id', 'country_id', 'zip', 'birthdate_date', 'date_hired'
    ];

    public function department()
    {
        return $this->hasMany('App\Models\Department');
    }
    public function city()
    {
        return $this->hasMany('App\Models\City');
    }
    public function state()
    {
        return $this->hasMany('App\Models\State');
    }
    public function country()
    {
        return $this->hasMany('App\Models\Country');
    }
}
