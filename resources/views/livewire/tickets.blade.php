<div>
    <h1 class="my-12 text-3x2 font-bold">Tickets</h1>
    <div>
        @foreach ($tickets as $ticket)
            <div class="rounded border shadow p-3 my-2 {{$active == $ticket->id ? 'bg-gray-200' : ''}}" wire:click="$emit('ticketSelected',{{$ticket->id}})">
                <p class="text-gray-800">{{$ticket->question}} </p>

            </div>
        @endforeach

    </div>
</div>
