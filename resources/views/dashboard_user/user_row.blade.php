<tr>
	<td>{{ $user->name }}</td>
	<td>{{ $user->email }}</td>
	<td>{{ $user->admin ? "Yes" : "No" }}</td>
	<td>
		<button type="button" class="btn btn-info btn-xs">Edit</button>
		<button type="button" class="btn btn-danger btn-xs">Delete</button>
	</td>
</tr>