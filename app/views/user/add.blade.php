@extends('layout')

@section('content')
		<form method="post" action="/users/add">
		<?php echo Form::token(); ?>
			<label> Username: </label>
			<input type="text" name="username" value="" required=""> <br>
			
			<label> password: </label>
			<input type="password" name="password" value="" required=""> <br>
			
			<button type="submit">Submit</button>
			
			
		</form>
@stop