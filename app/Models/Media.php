<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }
    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }
    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
