{{ Form::model($user, array('route' => 'user.edit', user->id)) }}

        <!-- name -->
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}

        <!-- email -->
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email') }}

        { Form::label('password', 'Password') }}
        {{ Form::email('password') }}


        {{ Form::submit('Update User!') }}

{{ Form::close() }}
