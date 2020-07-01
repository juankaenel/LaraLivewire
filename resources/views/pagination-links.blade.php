@if ($paginator->hasPages())
    <ul class="flex justify-between">
        <!--previousPage y next o reset son funciones  de la clase WithPagination  -->

        <!--Prev-->
        @if ($paginator->onFirstPage()) <!--si es la primera pagina no dejo que vaya para atrás-->
            <li class="py-1 px-2 text-center bg-blue-200 w-20 rounded shadow  ">Previous</li>
        @else
            <li wire:click="previousPage"
                class="py-1 px-2 text-center bg-blue-500 w-20 rounded shadow text-white cursor-pointer">Previous
            </li>
        @endif
        <!-- prev end-->

        <!--Numbers-->
        @foreach ($elements as $element)
            <div class="flex">
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                        @else
                            <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach

        <!--Numbers end-->

        <!--Next-->
        @if ($paginator->hasMorePages())
            <li wire:click="nextPage" class="py-1 px-2 text-center bg-blue-500 w-20 rounded shadow text-white cursor-pointer">Next</li>
        @else
            <li class="py-1 px-2 text-center bg-blue-200 w-20 rounded shadow  ">Next</li>
        @endif
    <!-- next end-->
    </ul>
@endif
