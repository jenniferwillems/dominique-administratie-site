@extends('layouts.base')

@section('content')
    <div class="pt-5">
        <h1>Boeken</h1>
        <h2>Boek bewerken</h2>

        <form method="post" action="{{route('books.update', $book)}}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$book->title}}">
            </div>

            <div class="form-group mb-3">
                <label for="series" class="form-label">Reeks</label>
                <input type="text" name="series" class="form-control" id="series" value="{{$book->series}}">
            </div>

            <div class="form-group mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control" value="{{$book->code}}">
            </div>

            <div class="d-flex p-2 bd-highlight">
                <form action="POST" action=""{{route('books.update', $book)}}>
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Save Book" class="btn btn-primary">
                </form>

                <div class="mx-2">
                    <div class="buttons d-flex">
                        <form action=""></form>
                        <form method="POST" action="{{route('books.destroy', $book)}}">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

