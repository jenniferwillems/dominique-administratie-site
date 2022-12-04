<x-app-layout>
    <div class="pt-5 d-flex justify-content-between align-items-center">
        <h1>Boeken</h1>
        <div class="w-50 d-flex justify-content-around">
            <input class="search form-control w-50" type="search" data-column="all" placeholder="Zoeken...">
            <a href="{{route('books.create')}}" class="btn btn-primary">Nieuwe boek toevoegen</a>
        </div>
    </div>

    <table id="data-table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Titel</th>
            <th>Series</th>
            <th>Code</th>
            <th class="sorter-false"></th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->series}}</td>
                <td>{{$book->code}}</td>
                <td class="text-center d-flex">
                    <a href="{{route('books.edit', $book)}}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script type="module">
        $( function () {
            $( '#data-table' ).tablesorter( {
                theme: '',
                widgets: ["filter", "saveSort" ],
                widgetOptions: {
                    filter_external: '.search',
                    filter_defaultFilter: { 1: '~{query}' },
                    filter_columnFilters: false,
                    filter_saveFilters: true,
                    saveSort: true,
                }
            } );
        });
    </script>
</x-app-layout>
