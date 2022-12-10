<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Games</h1>
        <h2>Game bewerken</h2>
        <form method="post" action="{{route('games.update', $game)}}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$game->title}}">
            </div>

            <div class="form-group mb-3">
                <label for="consoles" class="form-label">Console(s)</label>
                <select name="consoles[]" id="consoles" class="form-control select-2 w-100" multiple="multiple">
                </select>
            </div>

            <div class="d-flex p-2 bd-highlight">
                <form action="POST" action=""{{route('games.update', $game)}}>
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Save Game" class="btn btn-primary">
                </form>

                <div class="mx-2">
                    <div class="buttons d-flex">
                        <form method="POST" action="{{route('games.destroy', $game)}}">
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
		let gameTags = {!! json_encode(old('consoles') ?? $game->consoles ?? []) !!};

		let formattedGameTags = gameTags.map( ( obj ) => {
			return obj.id || obj;
		} );

		$( document ).ready( function () {
			$( ".select-2" ).select2( {
				tags: true,
				tokenSeparators: [ ',', ' ' ],
				theme: 'bootstrap4',
				data: {!! json_encode($tags) !!}
			} )
				.val( formattedGameTags ).trigger( 'change' );
		} );
	</script>
</x-app-layout>
