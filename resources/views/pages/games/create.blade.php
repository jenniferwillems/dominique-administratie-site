@extends('layouts.base')

@section('content')
    <div class="pt-5">
        <h1>Games</h1>
        <h2>Voeg een game toe</h2>
        <form action=""></form>
        <form method="post" action="{{route('games.store')}}">
            @csrf

            <div class="form-group mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" name="name" class="form-control" id="name">
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

            <input type="submit" value="Save Game" class="btn btn-primary">

        </form>
    </div>

@endsection


