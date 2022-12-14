<x-app-layout>
	<div class="pt-5 w-25 mx-auto">
		<h1>Tags</h1>
		<h2>Tag bewerken</h2>
		
		<form method="post" action="{{route('tags.update', $tag)}}">
			@csrf
			@method('PUT')

			<div class="form-group mb-3">
				<label for="name" class="form-label">Naam</label>
				<input type="text" name="name" class="form-control" id="name" value="{{$tag->name}}">
			</div>

			<div class="form-group mb-3">
				<label for="category_id" class="form-label">Tag categorie</label>
				<select name="category_id" id="category_id" class="form-control select-2">
				</select>
			</div>

			<div class="d-flex p-2 bd-highlight">
				<form action="POST" action=""{{route('tags.update', $tag)}}>
					@csrf
					@method('PUT')
					<input type="submit" value="Save Movie" class="btn btn-primary">
				</form>

				<div class="mx-2">
					<div class="buttons d-flex">
						<form method="POST" action="{{route('tags.destroy', $tag)}}">
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
		let tagCategory = {!! json_encode(old('category') ?? $tag->category ?? []) !!};
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
				.val( tagCategory.id ).trigger( 'change' );
		} );
	</script>
</x-app-layout>
