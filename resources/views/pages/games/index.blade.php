@extends('layouts.base')

@section('content')
    <div class="pt-5 d-flex justify-content-between align-items-center">
        <h1>Games</h1>
        <div class="w-50 d-flex justify-content-around">
            <input class="search form-control w-50" type="search" data-column="all" placeholder="Zoeken...">
            <a href="{{route('games.create')}}" class="btn btn-primary">Nieuwe game toevoegen</a>
        </div>
    </div>

    <table id="data-table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Genre</th>
            <th class="sorter-false"></th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        @foreach($games as $game)
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center d-flex">
                    <a href="{{route('games.edit', $game)}}" class="btn btn-primary">
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
@endsection



