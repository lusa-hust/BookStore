<tr>
	<td>{{ $book->title }}</td>
	<td>{{ $book->author }}</td>
	<td>{{ $book->price }}</td>
    <td>Category</td>
    <td>{{ $book->qty }}</td>
	<td>
		<button type="button" class="btn btn-info btn-xs">Edit</button>
		<button type="button" class="btn btn-danger btn-xs">Delete</button>
	</td>
</tr>