<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{route('books.index')}}">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class="bi bi-book fs-1 text-indigo-500"></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{$booksCount}}</h2>
                            <p class="leading-relaxed">Books</p>
                        </div>
                    </a>    
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{route('games.index')}}">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class="bi bi-controller fs-1 text-indigo-500"></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{$gamesCount}}</h2>
                            <p class="leading-relaxed">Games</p>
                        </div>
                    </a>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{route('movies.index')}}">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class="bi bi-film fs-1 text-indigo-500"></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{$moviesCount}}</h2>
                            <p class="leading-relaxed">Movies</p>
                        </div>
                    </a>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class="bi bi-box-seam fs-1 text-indigo-500"></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{$totalCount}}</h2>
                            <p class="leading-relaxed">Totaal</p>
                        </div>    
                </div>
            </div>
        </div>
    </section>
</div>
