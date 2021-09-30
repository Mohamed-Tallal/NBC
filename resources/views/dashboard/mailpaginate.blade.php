


@if ($paginator->hasPages())
        <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
            <ul class="pagination">        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paginate_button page-item previous disabled" id="sampleTable_previous">
                <span class="page-link rounded-l rounded-sm border border-brand-light px-3 py-2 cursor-not-allowed no-underline">
                    <i class="fa fa-chevron-left"></i></span></li>
        @else
            <li class="paginate_button page-item next" id="sampleTable_previous">
                <a
                class="page-link rounded-l rounded-sm border-t border-b border-l border-brand-light px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                    <i class="fa fa-chevron-left"></i>
                </a></li>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate_button page-item next" id="sampleTable_next">   <a class="page-link rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-chevron-right"></i></a></li>
        @else
            <li class="paginate_button page-item previous disabled" id="sampleTable_next">   <span class="page-link rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed"><i class="fa fa-chevron-right"></i></span></li>
        @endif
    </div>
@endif

</div>


