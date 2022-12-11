<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Boeken</h1>
        <h2>Boek bewerken</h2>
        <form method="post" action="{{route('books.update', $book)}}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$book->title}}">
            </div>

            <div class="form-group mb-3">
                <label for="series" class="form-label">Reeks</label>
                <select name="series" id="series" class="form-control select-2">
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control" value="{{$book->code}}">
            </div>

            <div class="d-flex bd-highlight">
                <form action="POST" action=""{{route('books.update', $book)}}>
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Save Book" class="btn btn-primary">
                </form>

                <div class="mx-2">
                    <div class="buttons d-flex">
                        <form method="POST" action="{{route('books.destroy', $book)}}">
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
		let bookTag = {!! json_encode(old('series') ?? $book->series ?? []) !!};

		$( document ).ready( function () {
			$( ".select-2" ).select2( {
				tags: true,
				tokenSeparators: [ ',' ],
				theme: 'bootstrap4',
				data: {!! json_encode($tags) !!}
			} )
				.val( bookTag.id ).trigger( 'change' );
		} );
	</script>
</x-app-layout>
