<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    // public $comments = [
    //     [
    //         'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi ex cupiditate quo commodi aspernatur delectus veniam necessitatibus.',
    //         'created_at' => '3 min ago',
    //         'creator' => 'Pav'
    //     ]
    // ];
    public $comments;

    public $newComment;

    public function mount()
    {
        $initialComments = Comment::all();
        // dd($initialComments);
        $this->comments = $initialComments;
    }


    public function addComment()
    {
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Pav Rao'
        ]);
        $this->newComment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
