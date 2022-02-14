<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        <div class="flex my-4">
            <input type="text" class="w-full p-2 my-2 mr-2 border rounded shadow" placeholder="What's on your mind?" wire:model="newComment">
            <div class="py-2">
                <button class="w-20 p-2 text-white bg-blue-500 rounded shadow" wire:click="addComment">Add</button>
            </div>
        </div>

        @foreach($comments as $comment)
        <div class="p-3 my-2 border rounded shadow">
            <div class="flex justify-start my-2">
                <p class="text-lg font-bold">{{ $comment->creator->name }}</p>
                <p class="py-1 mx-3 text-xs font-semibold text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <p class="text-gray-800">{{ $comment->body }}</p>
        </div>
        @endforeach
        
    </div>
</div> 
