<div>
    <h1 class="text-3xl">Support Tickets</h1>
    @foreach($tickets as $ticket)
        <div class="p-3 my-2 border rounded shadow {{  $active == $ticket->id ? 'bg-green-200' : '' }}" wire:click="$emit('ticketSelected', {{ $ticket->id }})">
            <p class="text-gray-800">{{ $ticket->question }}</p>
        </div>
        @endforeach
</div>
