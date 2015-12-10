<section class="page-section" id="section-map">
    <div id="section-map-map">
        {!! HTML::image(asset('img/land/backmap.png')) !!}
    </div>

    <div id="section-map-glitter">
        <ul class="glitter">
            <li class="glitter-item">{!! HTML::image(asset('img/land/1.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/2.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/3.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/4.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/5.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/1.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/3.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/2.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/3.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/1.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/2.png')) !!}</li>
            <li class="glitter-item">{!! HTML::image(asset('img/land/6.png')) !!}</li>
        </ul>
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
