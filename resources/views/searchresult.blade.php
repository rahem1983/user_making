<table border="1">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>email</td>
		<td>delete</td>
	</tr>
	@foreach($members as $member)
	<tr>
		<td>{{$member['id']}}</td>
		<td>{{$member['name']}}</td>
		<td>{{$member['email']}}</td>
		<td><a href={{"delete/".$member['id']}}>delete</a></td>
	</tr>
	@endforeach
</table>

<span> <a href="api/profile"> return to home</a></span>