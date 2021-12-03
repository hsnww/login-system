<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'subject', 'body'];
    use HasFactory;

    public function meta()
    {
        return $this->belongsTo('App\Models\MessagesMeta', 'id', 'message_id');
    }


}

