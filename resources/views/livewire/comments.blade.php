<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-12 text-3x2 font-bold">Comments</h1>
        <!--Capturamos los errores-->
        @error('newComment')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <!--Imprimos un mensaje de confirmación-->
        @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{session('message')}}
            </div>

        @endif


        <form type="submit" wire:submit.prevent="addComment" class="my-4 flex">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind?.."
                   wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button class="py-2 bg-blue-500 w-20 rounded shadow text-white" type="submit">Add</button>
            </div>
        </form>

        <div>
            @foreach ($comments as $comment)
                <div class="rounded border shadow p-3 my-2">
                    <div class="flex justify-between my-2">

                        <div class="flex">
                            <p class="font-bold text-lg">{{$comment->creator->name}}</p>
                            <p class="mx-3 py-1 text-xs text-gray-400 font-semibold">{{$comment->created_at->diffForHumans()}}</p>
                        </div>
                        <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="removeComment({{$comment->id}})"></i>
                    </div>
                        <p class="text-gray-800">{{$comment->body}} </p>
                </div>
            @endforeach
        {{$comments->links()}}
        </div>
    </div>

</div>
