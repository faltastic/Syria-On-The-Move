<section class="page-section" id="section-map">
    <div id="section-map-map">
        map
    </div>

    <div id="section-map-glitter">
        <div class="glitter">
            @foreach(App\Picture::random(9) as $picture)

                <?php $file = $picture->getThumbnail('thumb-550-x') ?>


                <div class="glitter-item"><img src="{{ $file->getUrl() }}" class="{!! $file->vertical()?'vertical':'horizontal' !!}"/></div>
            @endforeach
        </div>
    </div>

    <div id="section-map-overlay">
        <div id="section-map-overlay-calltoaction">
            <div id="section-map-overlay-calltoaction-container">
                {!! HTML::image(asset('img/syriaonthemove-nav.png')) !!}

                <a class="maplink" href="/map"> </a>
                <div class="slogan">Syrians are in many places now. {!! HTML::linkAction('PageController@getMap', 'Tell us through a picture') !!}</div>
                <div class="slogan ar">السوريين هالأيام بعدة أماكن {!! HTML::linkAction('PageController@getMap', 'خبرنا بصورة') !!}</div>
            </div>
        </div>
    </div>

</section>
