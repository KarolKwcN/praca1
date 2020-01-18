<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{

    protected $fillable = [
        'name' , 'description' , 'image'
    ];

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function devices()
    {
        return $this->hasOne(Device::class);
    }
}
