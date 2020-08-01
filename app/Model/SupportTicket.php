<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Comment;

class SupportTicket extends Model
{

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
