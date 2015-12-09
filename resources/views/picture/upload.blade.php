<section class="page-section">
    <div class="section-title">
        <h1>Upload</h1>
    </div>
    <div  class="c">
        {!! Form::open(['url' => action('UploadController@postIndex'), 'files' => true]) !!}

            {!! Form::file('picture') !!}
            q
            {!! Form::text('q') !!}
            lat
            {!! Form::text('lat') !!}
            lng
            {!! Form::text('lng') !!}


            WIP
            <ul>
                <li>Either way use q or lat & lng</li>
                <li>q = Query String for Geocoding Service</li>
            </ul>
            </ul>

            {!! Form::submit('upload') !!}

        {!! Form::close() !!}
    </div>
</section>
