@if ($paginator->hasPages())
<ul class="flex justify-between">
    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li class="w-16 px-2 py-1 text-center bg-gray-200 border rounded">Prev</li>
    @else
    <li class="w-16 px-2 py-1 text-center bg-white border rounded shadow cursor-pointer" wire:click="previousPage">Prev</li>
    @endif
    <!-- prev end -->

    <!-- numbers -->
    @foreach ($elements as $element)
    <div class="flex">
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="w-10 px-2 py-1 mx-2 text-center text-white bg-blue-500 border rounded shadow cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
        @else
        <li class="w-10 px-2 py-1 mx-2 text-center bg-white border rounded shadow cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
        @endif
        @endforeach
        @endif
    </div>
    @endforeach
    <!-- end numbers -->


    <!-- next  -->
    @if ($paginator->hasMorePages())
    <li class="w-16 px-2 py-1 text-center bg-white border rounded shadow cursor-pointer" wire:click="nextPage">Next</li>
    @else
    <li class="w-16 px-2 py-1 text-center bg-gray-200 border rounded">Next</li>
    @endif
    <!-- next end -->
</ul>
@endif 