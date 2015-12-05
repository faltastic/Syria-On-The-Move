<h1>Upload</h1>

{!! Form::open(['url' => action('UploadController@postIndex'), 'files' => true]) !!}

    {!! Form::file('picture') !!}

    {!! Form::submit('upload') !!}

{!! Form::close(); !!}
