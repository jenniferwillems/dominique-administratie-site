<div class="pt-5">
	<x-flash-message/>
	<div class="d-flex justify-content-between align-items-center">
		<h1>Games</h1>
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
				<x-buttons.primary href="{{route('games.create')}}" class="flex-shrink-0">Nieuwe game
				</x-buttons.primary>
			@endauth
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Consoles</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($games as $game)
				<tr>
					<td>{{$game->id}}</td>
					<td>{{$game->title}}</td>
					<td>
						@foreach($game->consoles as $console)
							<x-badge wire:click="addFilter({{$console}})"
							         class="bg-white">{{$console->name ?? ''}}</x-badge>
						@endforeach

					</td>

					@if(Auth::user())
						<td>
							<x-buttons.outline.dark href="{{route('games.edit', $game)}}" class="btn-sm">
								<i class="bi bi-pencil"></i>
							</x-buttons.outline.dark>
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $games->links() }}
</div>
