<tr id="{{ 'book_'.$book->id }}">
	<td>{{ $book->title }}</td>
	<td>{{ $book->author }}</td>
	<td>{{ $book->price }}</td>
    <td>{{ $book->qty }}</td>
	<td>
		<button data-id="{{$book->id}}" type="button" class="db-edit-book btn btn-info btn-xs">Edit</button>
		<button data-id="{{$book->id}}" type="button" class="db-delete-book btn btn-danger btn-xs">Delete</button>
	</td>
</tr>