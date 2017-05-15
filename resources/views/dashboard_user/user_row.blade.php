<tr id="user_{{$user->id}}">
	<td>{{ $user->name }}</td>
	<td>{{ $user->email }}</td>
	<td>{{ $user->admin ? "Yes" : "No" }}</td>
	<td>
		<button type="button" data-id="{{$user->id}}" class="user-edit-button btn btn-info btn-xs">Edit</button>
		<button type="button" data-id="{{$user->id}}" class="user-delete-button btn btn-danger btn-xs">Delete</button>
	</td>
</tr>