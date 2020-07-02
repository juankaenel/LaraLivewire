<div>
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

        <!--seccion de imagén-->

        <section>
            @if ($image)
            <img src="{{$image}}" width="200" alt="">
            @endif
            <input type="file" id="image" wire:change="$emit('fileChoosen')">
        </section>


        <!--end imagen-->


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
                        <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"
                           wire:click="removeComment({{$comment->id}})"></i>
                    </div>
                    <p class="text-gray-800">{{$comment->body}} </p>
                    <!--si existe la imagen en la bd mostramela-->
                    @if ($comment->image)
                        <img src="{{$comment->imagePath}}" alt="" width="100">
                    @endif
                </div>
            @endforeach
        <!--hago uso de la paginacion y le paso la pagina que controla el diseño de la paginacion-->
            {{ $comments->links('pagination-links') }}

        </div>
    </div>
</div>

<script>

    //ponemos a la escucha el metodo fileChoosen cuando se guarda una img
    window.livewire.on('fileChoosen', () =>{
        let inputField = document.getElementById('image')
        let file = inputField.files[0];
        let reader = new FileReader();

        reader.onloadend = () =>{
            window.livewire.emit('fileUploaded', reader.result) //emitimos el evento
        }
        reader.readAsDataURL(file);

    })

</script>

