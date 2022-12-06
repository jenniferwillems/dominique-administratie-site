<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Games</h1>
        <h2>Voeg een game toe</h2>
        <form method="post" action="{{route('games.store')}}">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title">
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
</x-app-layout>
