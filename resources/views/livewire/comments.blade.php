<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        @error('newComment') <span class="text-xs text-red-500">{{  $message }}</span> @enderror

        <div>
            @if (session()->has('message'))
                <div class="p-3 text-green-800 bg-green-300 rounded shadow-sm">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <section>
            @if ($image)
                <img src={{  $image }} width=200>
            @endif
            <input type="file" id="image" wire:change="$emit('fileChosen')">
        </section>
        
        <div class="flex my-4">
            <input type="text" class="w-full p-2 my-2 mr-2 border rounded shadow" placeholder="What's on your mind?" wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button class="w-20 p-2 text-white bg-blue-500 rounded shadow" wire:click="addComment">Add</button>
            </div>
        </div>

        @foreach($comments as $comment)
        <div class="p-3 my-2 border rounded shadow">
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="text-lg font-bold">{{ $comment->creator->name }}</p>
                    <p class="py-1 mx-3 text-xs font-semibold text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <i class="text-red-200 cursor-pointer fas fa-times hover:text-red-600" wire:click="remove({{ $comment->id }})"></i>
            </div>

            <p class="text-gray-800">{{ $comment->body }}</p>
        </div>
        @endforeach

        {{ $comments->links('pagination-links') }}
        
    </div>

    <script>
        Livewire.on('fileChosen', () => {
            let inputField = document.getElementById('image');
            let file = inputField.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUpload', reader.result)
                console.log(reader.result);
            }
            reader.readAsDataURL(file);
        })
    </script>
</div> 



