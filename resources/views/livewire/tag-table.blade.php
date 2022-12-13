<div class="py-5">
	<x-flash-message/>
	<div class="d-flex justify-content-between align-items-center">
		<h1>Tags</h1>
		<div class="mw-75 d-flex justify-content-between align-items-center">
			<div class="flex-grow-1">
				@if($selectedTag)
					Filter: <x-badge class="bg-white" type="dismissible">{{$selectedTag['name']}}
					</x-badge>
				@endif
			</div>

			<div class="mw-50 flex-shrink-0">
				<input type="text" class="form-control w-75 ms-5" placeholder="Zoeken..." wire:model="search">
			</div>

			@if(Auth::user())
				<x-buttons.primary href="{{route('tags.create')}}" class="flex-shrink-0">Nieuwe tag</x-buttons.primary>
			@endauth
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Naam</th>
				<th>Tag categorie</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($tags as $tag)
				<tr>
					<td>{{$tag->id}}</td>
					<td>{{$tag->name}}</td>
					<td>
						<x-badge wire:click="addFilter({{$tag->category}})" class="bg-white">{{$tag->category->name ?? ''}}</x-badge>
					</td>

					@if(Auth::user())
						<td>
							<x-buttons.outline.dark href="{{route('tags.edit', $tag)}}" class="btn-sm">
								<i class="bi bi-pencil"></i>
							</x-buttons.outline.dark>
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $tags->links() }}
</div>
