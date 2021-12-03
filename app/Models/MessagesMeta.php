<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessagesMeta extends Model
{
    protected $table = 'messages_metas';
    protected $fillable = ['message_id', 'user_id', 'to'];
    use HasFactory;

    public function message()
    {
        return $this->belongsTo('App\Models\Message', 'message_id','id');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function toUser()
    {
        return $this->belongsTo('App\Models\User', 'to','id');
    }

}
