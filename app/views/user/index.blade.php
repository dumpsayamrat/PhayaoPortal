@extends('layout')

@section('content')
<a href="/users/add">Add User</a> <br>

<table>
	<tr>
		<th>ID</th>
		<th>username</th>
		<th>password</th>
		<th>Action</th>
	</tr>
	<?php foreach ($users as $user) : ?>
	<tr>
		<td><?php echo $user->id;?></td>
		<td><?php echo $user->username;?></td>
		<td><?php echo $user->password;?></td>
		<td><a href="/users/<?php echo $user->id;?>/update">update</a></td>
	</tr>
	<?php endforeach;?>
</table>
@stop