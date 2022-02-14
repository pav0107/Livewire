<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function mount()
    {
        $initialComments = Comment::latest()->get();
        $this->comments = $initialComments;
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }


    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:255']);

        if ($this->newComment == '') {
            return;
        }

        $createdComment = Comment::create([
            'body' => $this->newComment, 'user_id' => 1
        ]);

        $this->comments->prepend($createdComment);

        $this->newComment = "";

        session()->flash('message', 'Comment successfully added.');
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);

        // delete from database
        $comment->delete();

        // update collection we have
        // $this->comments = $this->comments->where('id', '!=', $commentId);
        // same as the one below
        $this->comments = $this->comments->except($commentId);

        session()->flash('message', 'Comment successfully removed.');
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
