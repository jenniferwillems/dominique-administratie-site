<x-app-layout>
    <div class="pt-5 w-25 mx-auto">
        <h1>Films</h1>
        <h2>Film bewerken</h2>

        <form method="post" action="{{route('movies.update', $movie)}}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$movie->title}}">
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
                <form action="POST" action=""{{route('movies.update', $movie)}}>
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Save Movie" class="btn btn-primary">
                </form>

                <div class="mx-2">
                    <div class="buttons d-flex">
                        <form method="POST" action="{{route('movies.destroy', $movie)}}">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
