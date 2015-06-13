<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 8/3/2558
 * Time: 3:28
 */?>

@extends("layout")

@section('content')

    <form method="post" action="/users/<?php echo $user->id?>/update">

        <?php echo Form::token(); ?>

        <input type="hidden" name="id" value="<?php echo $user->id?>"/>

        <label>Username : </label>
        <input type="text" name="username" value="<?php echo $user->username?>" required=""/> <br/>

        <label>Password : </label>
        <input type="text" name="password" value="<?php echo $user->password?>" required=""/> <br/>

        <button type="submit">Submit</button>
    </form>
@stop