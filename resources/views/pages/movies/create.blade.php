<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Films</h1>
        <h2>Voeg een film toe</h2>
        <form method="post" action="{{route('movies.store')}}">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="form-group mb-3">
                <label for="genres" class="form-label">Genres</label>
                <select name="genres[]" id="genres" class="form-control select-2" multiple="multiple">
                </select>
            </div>

            <input type="submit" value="Save Movie" class="btn btn-primary">

        </form>
    </div>
    <script type="module">
        let oldInput = {!! json_encode(old('genres') ?? []) !!};
        $( document ).ready( function () {
            $( ".select-2" ).select2( {
                tags: true,
                tokenSeparators: [ ',', ' ' ],
                theme: 'bootstrap4',
                data: {!! json_encode($tags) !!}
            } )
                .val( oldInput ).trigger( 'change' );
        } );
    </script>
</x-app-layout>
