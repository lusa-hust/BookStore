<div class="search-item">
	<a href="{{route('books.show', $book->id)}}">
	    <span class="search-image">
	        <img src="/storage/covers/{{$book->image}}">
	    </span>
	    <span class="search-title">{{$book->title}}</span>
	    <p class="search-price"><b>{{$book->price}}&nbsp;đ</b></p>
	</a>
</div>