<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'company_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
