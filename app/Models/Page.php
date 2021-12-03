<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // user has many posts
    public function media()
    {
        return $this->hasMany('App\Models\Media');
    }

}
