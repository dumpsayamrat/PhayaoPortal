<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 3/30/2015
 * Time: 17:53
 */?>
<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 3/30/2015
 * Time: 17:52
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Portal PHAYAO | Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Semantic -->
    <link href="/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css">


    {{--<link href="/semantic/dist/ui-form/form.min.css" rel="stylesheet" type="text/css">--}}

    <link href="/css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="admin" class="container">
        <div class="ui page grid">
            {{ Form::open(array('route' => 'sessions.store','class' => 'ui form')) }}
                <h4 class="ui dividing header">LOGIN</h4>
                <div class="two fields">
                    <div class="required field">
                        {{ Form::label('username','Username : ') }}
                        <div class="ui icon input">
                            {{ Form::text('username',null,array('placeholder'=>'Username')) }}
                            <i class="user icon"></i>
                        </div>
                    </div>

                    <div class="required field">
                        {{ Form::label('password','Password : ') }}
                        <div class="ui icon input">
                            {{ Form::password('password', array('placeholder'=>'Password')) }}
                            <i class="lock icon"></i>
                        </div>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="remember" id="remember" />
                        {{ Form::label('remember','Remember me') }}
                    </div>
                </div>

                {{ Form::submit('Login',array('class' =>'ui blue button' )) }}
            {{ Form::close() }}
        </div>
    </div>
    <script src="/js/jquery.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/jquery-2.1.1.min.js"></script>
    <!-- Semantic -->
    <script src="/semantic/dist/semantic.min.js"></script>
    <script src="/js/app.js"></script>

    <script>
        $('.ui.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
        $('.dropdown')
                .dropdown({
                    // you can use any ui transition
                    transition: 'drop'
                });
        $('.ui.modal')
                .modal()
        ;
    </script>

</body>

</html>
