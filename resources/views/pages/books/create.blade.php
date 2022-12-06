<x-app-layout>
    <div class="pt-5">
        <h1>Boeken</h1>
        <h2>Voeg een boek toe</h2>
        <form action=""></form>
        <form method="post" action="{{route('books.store')}}">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="form-group mb-3">
                <label for="series" class="form-label">Reeks</label>
                <input type="text" name="series" class="form-control" id="series">
            </div>

            <div class="form-group mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" class="form-control" id="code">
            </div>

            <input type="submit" value="Save Book" class="btn btn-primary">

        </form>
    </div>
</x-app-layout>
