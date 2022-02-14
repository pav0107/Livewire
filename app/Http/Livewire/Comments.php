<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{
    use WithPagination;

    public $newComment;
    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }


    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:255']);

        $image = $this->storeImage();

        // if ($this->newComment == '') {
        //     return;
        // }

        $createdComment = Comment::create([
            'body' => $this->newComment, 'user_id' => 1,
            'image' => $image
        ]);

        $this->newComment = "";
        $this->image = "";

        session()->flash('message', 'Comment successfully added.');
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);

        if ($this->image) {
            Storage::disk('public')->delete($comment->image);
        }

        // delete from database
        $comment->delete();

        // update collection we have
        // $this->comments = $this->comments->where('id', '!=', $commentId);
        // same as the one below

        session()->flash('message', 'Comment successfully removed.');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2)
        ]);
    }
}
