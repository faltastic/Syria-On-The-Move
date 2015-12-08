<section class="page-section" id="section-map">
    <div id="section-map-map">
        map
    </div>

    <div id="section-map-glitter">
        <div class="glitter">
            @foreach(App\Picture::random(9) as $picture)

                <?php $file = $picture->getThumbnail('thumb-550-x'); ?>


                <div class="glitter-item"><img src="{{ $file->getUrl() }}" class="{!! $file->vertical()?'vertical':'horizontal' !!}"/></div>
            @endforeach
        </div>
    </div>

    <div id="section-map-overlay">
        <div id="section-map-overlay-calltoaction">
            <div class="container">
                <a href="/map">Go to the map</a>
                <a href="/map">add an image</a>
            </div>
        </div>
    </div>

</section>
