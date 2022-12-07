<div>
	<div class="pt-5 d-flex justify-content-between align-items-center">
		<h1>Boeken</h1>
		<div class="w-50 ps-5 d-flex justify-content-between">
			<input type="text" class="form-control w-50 ms-5" placeholder="Zoeken..." wire:model="search">

			<x-buttons.primary href="{{route('books.create')}}">Nieuw boek</x-buttons.primary>
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
					<td>{{$book->series->name ?? ''}}</td>
					<td>{{$book->code}}</td>
					<td>
						<x-buttons.outline.dark href="{{route('books.edit', $book)}}" class="btn-sm">
							<i class="bi bi-pencil"></i>
						</x-buttons.outline.dark>
					</td>
					<td>
						<form method="POST" action="{{route('books.destroy', $book)}}">
							@csrf
							@method('delete')
							<button class="btn btn-sm btn-outline-dark" type="submit"><i class="bi bi-trash3"></i></button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $books->links() }}
</div>
