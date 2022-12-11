<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Films</h1>
        <h2>Film bewerken</h2>

        <form method="post" action="{{route('movies.update', $movie)}}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$movie->title}}">
            </div>

            <div class="form-group mb-3">
                <label for="genres" class="form-label">Genres</label>
                <select name="genres[]" id="genres" class="form-control select-2 w-100" multiple="multiple">
                </select>
            </div>

            <div class="d-flex p-2 bd-highlight">
                <form action="POST" action=""{{route('movies.update', $movie)}}>
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Save Movie" class="btn btn-primary">
                </form>

                <div class="mx-2">
                    <div class="buttons d-flex">
                        <form method="POST" action="{{route('movies.destroy', $movie)}}">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="module">
        let movieTags = {!! json_encode(old('genres') ?? $movie->genres ?? []) !!};

        let formattedMovieTags = movieTags.map( ( obj ) => {
            return obj.id || obj;
        } );

        $( document ).ready( function () {
            $( ".select-2" ).select2( {
                tags: true,
                tokenSeparators: [ ',', ' ' ],
                theme: 'bootstrap4',
                data: {!! json_encode($tags) !!}
            } )
                .val( formattedMovieTags ).trigger( 'change' );
        } );
    </script>
</x-app-layout>
