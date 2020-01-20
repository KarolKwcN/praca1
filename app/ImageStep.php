<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageStep extends Model
{
    protected $fillable = [
         'description'
    ];

    public function repairs()
    {
        return $this->hasOne(Step::class);
    }
}
