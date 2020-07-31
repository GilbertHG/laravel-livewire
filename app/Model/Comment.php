<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
