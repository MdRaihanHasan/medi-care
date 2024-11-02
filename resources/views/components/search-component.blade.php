<div class="top-nav-search table-search-blk">
    <form method="GET" action="{{ request()->url() }}">
        <input type="text" name="search" class="form-control" placeholder="Search here" value="{{ old('search', $searchTerm) }}">
        <button type="submit" class="btn">
            <img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt="">
        </button>
    </form>
</div>
