<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Model\Comment;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class Comments extends Component
{
    use WithPagination;
    // public $comments;

    public $newComment;
    public $image;
    public $ticketId = 1;
    protected $listeners = [
        'fileUpload'        => 'handleFileUpload',
        'ticketSelected',
    ];

    public function handleFileUpload($imageData){
        $this->image = $imageData;
    }

    public function ticketSelected($ticketId){
        $this->ticketId = $ticketId;
    }

    // public function mount()
    // {
    //     // dd($comments);
    //     // $initialComments = Comment::latest()->get();
    //     // $this->comments = $initialComments;
    // }

    public function updated($field)
    {
        $this->validateOnly($field,['newComment' => 'required|max:255']);
    }

    public function addComment()
    {
        $this->validate(['newComment'   => 'required|max:255']);
        $image = $this->storeImage();
        $createdComment = Comment::create([
            'body'=>$this->newComment, 
            'image'=> $image,
            'user_id'=> 1,
            'support_ticket_id' => $this->ticketId
        ]);
        // $this->comments->prepend($createdComment);
        $this->newComment = "";
        $this->image = "";
        session()->flash('message', 'Comment added successfully 😁');
    }

    public function storeImage()
    {
        if(!$this->image) {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random().".jpg";
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentId)
    {
        $comment=Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        if($comment != null){
            $comment->delete();
            // $this->comments = $this->comments->except($commentId);
            session()->flash('message', 'Comment deleted successfully 😠');
        }
    }   

    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(3)
        ]);
    }
}
