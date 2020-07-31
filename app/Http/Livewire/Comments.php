<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Model\Comment;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function mount()
    {
        // dd($comments);
        $initialComments = Comment::latest()->get();
        $this->comments = $initialComments;
    }

    public function updated($field)
    {
        $this->validateOnly($field,['newComment' => 'required|max:255']);
    }

    public function addComment()
    {
        $this->validate(['newComment'   => 'required|max:255']);
        $createdComment = Comment::create([
            'body'=>$this->newComment, 
            'user_id'=> 1
        ]);
        $this->comments->prepend($createdComment);
        $this->newComment = "";
    }

    public function remove($commentId)
    {
        $comment=Comment::find($commentId);
        $comment->delete();
        $this->comments = $this->comments->except($commentId);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
