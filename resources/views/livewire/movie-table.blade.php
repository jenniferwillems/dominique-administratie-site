<div class="pt-5">
	<x-flash-message/>
	<div class="d-flex justify-content-between align-items-center">
		<h1>Films</h1>
		<div class="mw-75 d-flex justify-content-between align-items-center">
			<div class="flex-grow-1">
				@if($selectedTag)
					Filter:
					<x-badge class="bg-white" type="dismissible">{{$selectedTag['name']}}
					</x-badge>
				@endif
			</div>

			<div class="mw-50 flex-shrink-0">
				<input type="text" class="form-control w-75 ms-5" placeholder="Zoeken..." wire:model="search">
			</div>

			@if(Auth::user())
				<x-buttons.primary href="{{route('games.create')}}" class="flex-shrink-0">Nieuwe film
				</x-buttons.primary>
			@endauth
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Genres</th>
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
							<x-badge wire:click="addFilter({{$genre}})"
							         class="bg-white">{{$genre->name ?? ''}}</x-badge>
						@endforeach

					</td>

					@if(Auth::user())
						<td>
							<x-buttons.outline.dark href="{{route('movies.edit', $movie)}}" class="btn-sm">
								<i class="bi bi-pencil"></i>
							</x-buttons.outline.dark>
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $movies->links() }}
</div>
