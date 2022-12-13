<x-app-layout>
	<div class="pt-5 w-25 mx-auto">
		<h1>Tag</h1>
		<h2>Voeg een tag toe</h2>
		<form method="post" action="{{route('tags.store')}}">
			@csrf

			<div class="form-group mb-3">
				<label for="name" class="form-label">Naam</label>
				<input type="text" name="name" class="form-control" id="name">
			</div>

			<div class="form-group mb-3">
				<label for="category_id" class="form-label">Reeks</label>
				<select name="category_id" id="category_id" class="form-control select-2">
				</select>
			</div>

			<input type="submit" value="Save Book" class="btn btn-primary">

		</form>
	</div>
	<script type="module">
		let oldInput = {!! json_encode(old('category') ?? []) !!};
		$( document ).ready( function () {
			$( ".select-2" ).select2( {
				tags: true,
				createTag: (tag) => {
					return undefined;
				},
				tokenSeparators: [ ','],
				theme: 'bootstrap4',
				data: {!! json_encode($categories) !!}
			} )
				.val( oldInput ).trigger( 'change' );
		} );
	</script>
</x-app-layout>
