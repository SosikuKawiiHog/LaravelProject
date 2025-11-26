@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">{!! __('pagination.next') !!}</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    </nav>
    <div class="mt-3">
        <form method="GET" class="d-inline">
            <label for="perpage" class="form-label d-inline me-2">Записей на странице:</label>
            <select name="perpage" id="perpage" class="form-select d-inline" style="width: auto;" onchange="this.form.submit()">
                <option value="2" @if(request('perpage', 2) == 2) selected @endif>2</option>
                <option value="3" @if(request('perpage', 2) == 3) selected @endif>3</option>
                <option value="4" @if(request('perpage', 2) == 4) selected @endif>4</option>
                <option value="5" @if(request('perpage', 2) == 5) selected @endif>5</option>
                <option value="10" @if(request('perpage', 2) == 10) selected @endif>10</option>
            </select>

            {{-- Сохраняем остальные GET-параметры (например, поиск) --}}
            @foreach(request()->except('perpage', 'page') as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>
    </div>
@endif
