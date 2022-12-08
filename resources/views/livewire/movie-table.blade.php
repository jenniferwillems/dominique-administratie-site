<div>
	<div class="pt-5 d-flex justify-content-between align-items-center">
		<h1>Films</h1>
		<div class="w-50 ps-5 d-flex justify-content-between">
			<input type="text" class="form-control w-50 ms-5" placeholder="Zoeken..." wire:model="search">

            @if(Auth::user())
			    <x-buttons.primary href="{{route('movies.create')}}">Nieuwe film</x-buttons.primary>
            @endif
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Genre</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($movies as $movie)
				<tr>
					<td>{{$movie->id}}</td>
					<td>{{$movie->title}}</td>
					<td>
						@foreach($movie->genres as $genre)
							{{$genre->name}}
						@endforeach
					</td>

                    @if(Auth::user())
					<td>
						<x-buttons.outline.dark href="{{route('movies.edit', $movie)}}" class="btn-sm">
							<i class="bi bi-pencil"></i>
						</x-buttons.outline.dark>
					</td>
					<td>
						<form method="POST" action="{{route('movies.destroy', $movie)}}">
							@csrf
							@method('delete')
							<button class="btn btn-sm btn-outline-dark" type="submit"><i class="bi bi-trash3"></i></button>
						</form>
					</td>
                        @endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $movies->links() }}
</div>
