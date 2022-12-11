<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Boeken</h1>
        <h2>Voeg een boek toe</h2>
        <form method="post" action="{{route('books.store')}}">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="form-group mb-3">
                <label for="series" class="form-label">Reeks</label>
                <select name="series" id="series" class="form-control select-2">
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control" id="code">
            </div>

            <input type="submit" value="Save Book" class="btn btn-primary">

        </form>
    </div>
	<script type="module">
		let oldInput = {!! json_encode(old('series') ?? []) !!};
		$( document ).ready( function () {
			$( ".select-2" ).select2( {
				tags: true,
				tokenSeparators: [ ','],
				theme: 'bootstrap4',
				data: {!! json_encode($tags) !!}
			} )
				.val( oldInput ).trigger( 'change' );
		} );
	</script>
</x-app-layout>
