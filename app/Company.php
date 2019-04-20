<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $fillable = [
        'name',
        'adress',
        'website',
        'email',
        'logo_path'
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }

}
