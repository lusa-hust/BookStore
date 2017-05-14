<div class="col-xs-6 col-sm-6 col-md-4 bookcover-block">
    <div class="bookcover-container">
        <a href={{ route('books.show', $book->id) }}>
            <img src="/storage/covers/{{$book->id}}.jpg" alt="book title">
            <div class="book-title">
                {{$book->title}}
            </div>
        </a>
    </div>
</div>