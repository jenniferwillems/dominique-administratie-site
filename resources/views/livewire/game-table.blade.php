<div class="pt-5">
	<x-flash-message/>
	<div class="d-flex justify-content-between align-items-center">
		<h1>Games</h1>
		<div class="w-50 ps-5 d-flex justify-content-between">
			<input type="text" class="form-control w-50 ms-5" placeholder="Zoeken..." wire:model="search">

            @if(Auth::user())
			    <x-buttons.primary href="{{route('games.create')}}">Nieuwe game</x-buttons.primary>
            @endif
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Console</th>
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
							<x-badge>{{$console->name}}</x-badge>
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
