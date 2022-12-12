<div class="pt-5">
	<x-flash-message/>
	<div class="d-flex justify-content-between align-items-center">
		<h1>Boeken</h1>
		<div class="w-50 d-flex justify-content-between align-items-center">
			<div class="w-25">
				@if($selectedTag)
					Filter: <x-badge class="bg-white" type="dismissible">{{$selectedTag['name']}}
					</x-badge>
				@endif
			</div>

			<div class="w-50">
				<input type="text" class="form-control w-75 ms-5" placeholder="Zoeken..." wire:model="search">
			</div>

            @if(Auth::user())
                <x-buttons.primary href="{{route('books.create')}}">Nieuw boek</x-buttons.primary>
            @endauth
		</div>
	</div>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Serie</th>
				<th>Code</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($books as $book)
				<tr>
					<td>{{$book->id}}</td>
					<td>{{$book->title}}</td>
					<td>
						<x-badge wire:click="addFilter({{$book->series}})" class="bg-white">{{$book->series->name ?? ''}}</x-badge>
					</td>
					<td>{{$book->code}}</td>

                    @if(Auth::user())
					<td>
						<x-buttons.outline.dark href="{{route('books.edit', $book)}}" class="btn-sm">
							<i class="bi bi-pencil"></i>
						</x-buttons.outline.dark>
					</td>
                    @endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $books->links() }}
</div>
