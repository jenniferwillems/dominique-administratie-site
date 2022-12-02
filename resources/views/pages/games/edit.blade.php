@extends('layouts.base')

@section('content')
    <div class="pt-5">
        <h1>Games</h1>
        <h2>Game bewerken</h2>

        <form method="post" action="{{route('games.update', $game)}}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$games->name}}">
            </div>

            <div class="form-group mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select class="form-select" id="tag" name="tag">
                    <option selected disabled>Selecteer een genre</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex p-2 bd-highlight">
                <form action="POST" action=""{{route('games.update', $game)}}>
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Save Game" class="btn btn-primary">
                </form>

                <div class="mx-2">
                    <div class="buttons d-flex">
                        <form action=""></form>
                        <form method="POST" action="{{route('games.destroy', $game)}}">
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


