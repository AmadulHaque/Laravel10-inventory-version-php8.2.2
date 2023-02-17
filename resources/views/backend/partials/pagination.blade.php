<div class="table-bottom-wrapper">
    <div class="out-of-showing">
        <p>{{ $paginate->firstItem() }} - {{ $paginate->lastItem() }} of {{ $paginate->total() }} (for page {{ $paginate->currentPage() }} )</p>
    </div>
    <div class="pagination-wraper">
        <nav aria-label="...">
            {!! $paginate->links() !!}
        </nav>

    </div>
</div>
