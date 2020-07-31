<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'body'          => 'Lorem Ipsum . . .',
            'created_at'    => '3 min ago...',
            'creator'       => 'GilberHG'
        ]
    ];

    public $newComment;

    public function addComment()
    {
        if($this->newComment != ''){
            array_unshift($this->comments,[
                'body'          => $this->newComment,
                'created_at'    => Carbon::now()->diffForHumans(),
                'creator'       => 'GilberHG'
            ]);
            $this->newComment = "";
        }
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
